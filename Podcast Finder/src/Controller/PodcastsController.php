<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Action\Episodes\ReadFeed;
use App\Model\Action\Podcasts\Find;

/**
 * Podcasts Controller
 * @property \App\Model\Table\PodcastsTable $Podcasts
 */
class PodcastsController extends AppController
{
    /**
     * @param \App\Model\Action\Podcasts\Find $modelAction
     * @return void
     */
    public function index(Find $modelAction)
    {
        $term = $this->request->getQuery('term');
        $podcastData = $modelAction->execute($term);

        $this->set(compact('podcastData'));
    }

    /**
     * @param \App\Model\Action\Episodes\ReadFeed $modelAction
     * @param string|null $id Podcast id
     */
    public function episodes(ReadFeed $modelAction, string $id = null)
    {
        $podcast = $this->Podcasts->get($id);
        $episodes = $modelAction->execute($podcast->feed_url);

        $this->set(compact('episodes', 'podcast'));
    }
}
