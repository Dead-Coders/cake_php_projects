<?php


namespace App\Model\Action\Episodes;


use Cake\Http\Client;
use Cake\I18n\Time;

class ReadFeed
{
    /**
     * @param string $url
     * @return array
     */
    public function execute(string $url): array
    {
        $client = Client::createFromUrl($url);
        $body = $client->get('')
            ->getStringBody();

        $response = simplexml_load_string($body, 'SimpleXMLElement', LIBXML_NOCDATA);
        $items = [];
        foreach ($response->channel->item as $item) {
            $items[] = [
                'title' => (string)$item->title,
                'description' => strip_tags((string)$item->description),
                'guid' => (string)$item->guid,
                'pub_date' => (new Time((string)$item->pubDate)),
                'url' => (string)$item->enclosure->attributes()->url,
            ];
        }

        return $items;
    }
}
