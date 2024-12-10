<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Screen Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $tags
 *
 * @property \App\Model\Entity\Schedule[] $schedules
 */
class Screen extends Entity
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
        'tags' => true,
        'schedules' => true,
    ];
}
