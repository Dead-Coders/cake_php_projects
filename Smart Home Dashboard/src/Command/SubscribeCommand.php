<?php
declare(strict_types=1);

namespace App\Command;

use App\Mqtt\ClientBuilder;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;

/**
 * Subscribe command.
 *
 * @property \App\Model\Table\DevicesTable $Devices
 */
class SubscribeCommand extends Command
{
    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Devices');
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $mqtt = ClientBuilder::create();
        try {
            $io->out(__('Connecting'));
            $mqtt->connect();
        } catch (\Exception $e) {
            $io->error(__('Error to connect {0}', $e->getMessage()));
        }
        try {
            $io->out(__('Setup Subscribe Callback'));
            $filter = Configure::read('MqttBroker.subscribeTopicFilter');
            $idStartAt = strlen($filter) - 1;
            $mqtt->subscribe($filter, function ($topic, $message) use ($idStartAt, $io) {
                $this->handleTopic($topic, $idStartAt, $message, $io);
            }, 0);
        } catch (\Exception $e) {
            $io->error(__('Error to subscribe {0}', $e->getMessage()));
        }
        try {
            $io->out(__('Start loop'));
            $mqtt->loop(true);
        } catch (\Exception $e) {
            $io->error(__('Error to loop {0}', $e->getMessage()));
        }

        try {
            $io->out(__('Disconnecting'));
            $mqtt->disconnect();
        } catch (\Exception $e) {
            $io->error(__('Error to disconnect {0}', $e->getMessage()));
        }
    }

    /**
     * @param $topic
     * @param int $idStartAt
     * @param $message
     * @param ConsoleIo $io
     */
    protected function handleTopic($topic, int $idStartAt, $message, ConsoleIo $io): void
    {
        $id = substr(trim($topic), $idStartAt);
        $message = strtoupper(trim($message));
        $io->out(json_encode(compact('id', 'message', 'topic')));
        try {
            $entity = $this->Devices->get($id);
            $this->Devices->updateStatus($entity, $message);
        } catch (\Exception $e) {
            $this->log($e->getMessage());
        }
    }
}
