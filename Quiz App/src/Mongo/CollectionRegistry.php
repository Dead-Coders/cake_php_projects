<?php


namespace App\Mongo;


use Cake\Core\Configure;
use MongoDB\Client;

class CollectionRegistry
{
    /**
     * @param string $name
     */
    public static function get(string $name)
    {
        $config = Configure::read('MongoDB.default');

        $client = new Client($config['url']);

        return $client->selectCollection(
            $config['database'],
            $name
        );
    }
}
