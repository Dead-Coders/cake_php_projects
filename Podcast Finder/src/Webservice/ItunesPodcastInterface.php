<?php

namespace App\Webservice;

/**
 * Interface ItunesPodcastInterface
 * @package App\Webservice
 */
interface ItunesPodcastInterface
{
    /**
     * @param string $term
     * @return array|mixed
     */
    public function search(string $term);
}
