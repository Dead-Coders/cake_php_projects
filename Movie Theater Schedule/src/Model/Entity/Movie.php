<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $name
 * @property string $synopsis
 * @property int $duration
 *
 * @property \App\Model\Entity\Schedule[] $schedules
 * @property \App\Model\Entity\Schedule[][] $schedules_by_screen
 */
class Movie extends Entity
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
        'name' => true,
        'synopsis' => true,
        'duration' => true,
        'schedules' => true,
    ];
}
