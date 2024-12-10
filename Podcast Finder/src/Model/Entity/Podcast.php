<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Podcast Entity
 *
 * @property int $id
 * @property string $feed_url
 * @property string $artist_name
 * @property string $collection_name
 * @property int $collection_id
 * @property string $artwork_url_100
 * @property string $artwork_url_600
 *
 * @property \App\Model\Entity\Collection $collection
 */
class Podcast extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'feed_url' => true,
        'artist_name' => true,
        'collection_name' => true,
        'collection_id' => true,
        'artwork_url_100' => true,
        'artwork_url_600' => true,
        'collection' => true,
    ];
}
