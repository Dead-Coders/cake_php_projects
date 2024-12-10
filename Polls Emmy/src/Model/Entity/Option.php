<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Option Entity
 *
 * @property int $id
 * @property int $poll_id
 * @property string $name
 * @property string|null $photo_url
 * @property int $response_count
 *
 * @property \App\Model\Entity\Poll $poll
 * @property \App\Model\Entity\Response[] $responses
 */
class Option extends Entity
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
        'poll_id' => true,
        'name' => true,
        'photo_url' => true,
        'response_count' => true,
        'poll' => true,
        'responses' => true,
    ];
}
