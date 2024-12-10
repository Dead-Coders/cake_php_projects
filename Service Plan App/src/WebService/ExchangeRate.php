<?php

namespace App\WebService;

use Cake\Core\Configure;
use Cake\Http\Client;

class ExchangeRate
{
    public function get()
    {
        $url = Configure::read('ExchangeRateService.url');
        $base = Configure::read('ExchangeRateService.base');
        $client = Client::createFromUrl($url);
        $query = [
            'access_key' => Configure::read('ExchangeRateService.access_key'),
        ];
        if ($base) {
            $query['base'] = $base;
        }

        return $client->get('latest', $query)
            ->getJson();
    }
}
