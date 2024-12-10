<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transfer Entity
 *
 * @property int $id
 * @property string $file
 * @property string $file_dir
 * @property string $user_id
 * @property string $email_to
 * @property \Cake\I18n\FrozenTime $created
 * @property string $security_key
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Transfer extends Entity
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
        'file' => true,
        'file_dir' => true,
        'user_id' => true,
        'email_to' => true,
        'created' => true,
        'user' => true,
    ];
}
