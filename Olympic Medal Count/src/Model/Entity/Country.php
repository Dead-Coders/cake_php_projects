<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Country Entity
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property int $gold_medal_count
 * @property int $silver_medal_count
 * @property int $bronze_medal_count
 * @property int $medal_count
 *
 * @property \App\Model\Entity\Medal[] $medals
 */
class Country extends Entity
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
        'icon' => true,
        'gold_medal_count' => true,
        'silver_medal_count' => true,
        'bronze_medal_count' => true,
        'medals' => true,
    ];

    /**
     * Get full medal count, accessor for $this->medal_count
     * @return int
     */
    protected function _getMedalCount()
    {
        return $this->gold_medal_count + $this->silver_medal_count + $this->bronze_medal_count;
    }
}
