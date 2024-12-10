<?php


namespace App\Model\Document;


use App\CouchDB\ClientFactory;
use Cake\ORM\Entity;
use PHPOnCouch\CouchClient;

class AppDocument
{
    protected $databaseName;


    /**
     * Get a new or existing couchdb client
     *
     * @return \PHPOnCouch\CouchClient
     * @throws \Exception
     */
    protected function getClient(): CouchClient
    {
        return ClientFactory::build($this->databaseName);
    }

    /**
     * Get all records
     *
     * @param bool $simplified
     * @return object[]
     * @throws \PHPOnCouch\Exceptions\CouchException
     */
    public function getAll(bool $simplified = true)
    {
        $rows = $this->getClient()
            ->include_docs(true)
            ->getAllDocs()->rows ?? [];
        if ($simplified === false) {
            return $rows;
        }

        return array_map(function($row) {
            return $row->doc;
        }, $rows);
    }

    /**
     * Get one record.
     *
     * @param string $id
     */
    public function get($id)
    {
        return $this->getClient()->getDoc($id);
    }

    /**
     * @param object $document
     */
    public function save($document)
    {
        $this->getClient()->storeDoc($document);
    }
}
