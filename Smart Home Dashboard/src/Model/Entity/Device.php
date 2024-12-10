<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $last_status
 * @property int $device_group_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DeviceGroup $device_group
 */
class Device extends Entity
{
    const TYPE_LIGHT_BULB = 'LIGHT_BULB';
    const TYPE_TV = 'TV';
    const TYPE_AUDIO_SYSTEM = 'AUDIO_SYSTEM';
    const TYPE_CURTAIN = 'CURTAIN';
    const TYPE_DOOR = 'DOOR';
    const TYPE_WINDOW = 'WINDOW';

    const STATUS_ON = 'ON';
    const STATUS_OFF = 'OFF';
    const STATUS_N_A = 'N_A';

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
        'type' => true,
        'last_status' => true,
        'device_group_id' => true,
        'created' => true,
        'modified' => true,
        'device_group' => true,
    ];
}
