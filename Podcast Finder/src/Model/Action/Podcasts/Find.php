<?php


namespace App\Model\Action\Podcasts;


use App\Webservice\ItunesPodcast;
use App\Webservice\ItunesPodcastInterface;
use Cake\Datasource\ModelAwareTrait;

class Find
{
    use ModelAwareTrait;

    /**
     * @var \Cake\Datasource\RepositoryInterface
     */
    private $Model;
    /**
     * @var ItunesPodcastInterface
     */
    private $service;

    /**
     * Find constructor.
     *
     * @param \App\Webservice\ItunesPodcastInterface $service
     */
    public function __construct(ItunesPodcastInterface $service)
    {
        $this->Model = $this->loadModel('Podcasts');
        $this->service = $service;
    }

    /**
     * @param string|null $term
     * @return array|mixed
     */
    public function execute(?string $term)
    {
        if (empty($term)) {
            return ['results' => []];
        }

        $response = $this->service->search($term);
        if (!$response['results']) {
            return $response;
        }
        $results = $this->filterValid($response['results']);
        $existingList = $this->getExisting($results);
        $results = $this->mapAndSave($existingList, $results);

        return [
            'resultCount' => count($results),
            'results' => $results,
        ];
    }

    /**
     * @param  array $results
     * @return mixed
     */
    protected function filterValid($results)
    {
        $results = array_filter($results, function ($podcast) {
            return isset($podcast['feedUrl']);
        });

        return array_values($results);
    }

    /**
     * @param $results
     * @return array
     */
    protected function getExisting($results): array
    {
        $collectionIds = collection($results)
            ->extract('collectionId')
            ->toList();

        return $this->Model->find()
            ->where(['collection_id IN' => $collectionIds])
            ->all()
            ->combine('collection_id', function ($podcast) {
                return $podcast;
            })
            ->toArray();
    }

    /**
     * @param array $existingList
     * @param $results
     * @return array|\Cake\Datasource\EntityInterface[]
     */
    protected function mapAndSave(array $existingList, $results): array
    {
        return array_map(function ($podcast) use ($existingList) {
            $collectionId = $podcast['collectionId'];
            $data = [
                'feed_url' => $podcast['feedUrl'],
                'artist_name' => $podcast['artistName'],
                'collection_name' => $podcast['collectionName'],
                'collection_id' => $podcast['collectionId'],
                'artwork_url_100' => $podcast['artworkUrl100'],
                'artwork_url_600' => $podcast['artworkUrl600'],
            ];
            if (isset($existingList[$collectionId])) {
                $entity = $existingList[$collectionId];
                $this->Model->patchEntity($entity, $data);
            } else {
                $entity = $this->Model->newEntity($data);
            }

            $this->Model->save($entity);

            return $entity;
        }, $results);
    }
}
