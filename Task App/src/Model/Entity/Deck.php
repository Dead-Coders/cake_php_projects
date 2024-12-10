<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deck Entity
 *
 * @property string $id
 * @property string $name
 * @property string $style
 * @property string $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\Task[] $tasks
 */
class Deck extends Entity
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
        'style' => true,
        'user_id' => false,
        'created' => true,
        'user' => false,
        'tasks' => true,
    ];
}
