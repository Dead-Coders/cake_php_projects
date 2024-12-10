<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medal Entity
 *
 * @property int $id
 * @property int $sport_id
 * @property int $country_id
 * @property string $event_name
 * @property string $type
 *
 * @property \App\Model\Entity\Sport $sport
 * @property \App\Model\Entity\Country $country
 */
class Medal extends Entity
{
    const TYPE_GOLD = 'gold';
    const TYPE_SILVER = 'silver';
    const TYPE_BRONZE = 'bronze';
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
        'sport_id' => true,
        'country_id' => true,
        'event_name' => true,
        'type' => true,
        'sport' => true,
        'country' => true,
    ];
}
