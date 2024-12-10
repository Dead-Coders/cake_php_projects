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
 * SampleSmartHomeCenterPublish command.
 */
class SampleSmartHomeCenterPublishCommand extends Command
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
        $id = $args->getArgumentAt(0);
        $status = $args->getArgumentAt(1);
        $mqtt = ClientBuilder::create();
        $mqtt->connect();
        $topic = Configure::read('MqttBroker.subscribeTopicFilter');
        $topic = str_replace('#', $id, $topic);
        debug(compact("topic", 'id', 'status'));
        $mqtt->publish($topic, $status, 0);
        $mqtt->disconnect();
    }
}
