<?php

namespace App\Webservice;

use Cake\Http\Client;

/**
 * Class ItunesPodcast
 *
 * @package App\Webservice
 */
class ItunesPodcast implements ItunesPodcastInterface
{
    /**
     * @param string $term
     * @return array|mixed
     */
    public function search(string $term)
    {
        $client = $this->getClient();
        $response = $client->get('/search', [
            'term' => $term,
            'media' => 'podcast',
        ]);

        return $response->getJson();
    }

    /**
     * @return Client
     */
    protected function getClient(): Client
    {
        $url = 'https://itunes.apple.com';

        return Client::createFromUrl($url);
    }
}
