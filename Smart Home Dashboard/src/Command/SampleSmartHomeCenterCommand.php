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
 * SampleSmartHomeCenter command.
 */
class SampleSmartHomeCenterCommand extends Command
{
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
            $topicFilter = Configure::read('MqttBroker.publishTopicPrefix') . '#';
            $mqtt->subscribe($topicFilter, function ($topic, $message) {
                echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);
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
}
