<?php


namespace App\CouchDB;


use Cake\Core\Configure;
use PHPOnCouch\CouchClient;

class ClientFactory
{

    /**
     * Get instance of a new CouchClient
     *
     * @param string $database CouchDB database name
     * @return CouchClient
     *@throws \Exception
     */
    public static function build(string $database): CouchClient
    {
        $key = 'CouchDB.default.url';
        $url = Configure::read($key, ' http://127.0.0.1:5984');
        if (!is_string($url) || empty($url)) {
            throw new \InvalidArgumentException(__('Config key "{0}" must be a valid CouchDB url', $key));
        }

        return new CouchClient($url, $database);
    }
}
