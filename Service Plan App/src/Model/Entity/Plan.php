<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $description
 * @property float $rate
 */
class Plan extends Entity
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
        'price' => true,
        'description' => true,
    ];

    /**
     * Accessor for $this->rate
     * @param float|null $value
     * @return float
     */
    protected function _getRate($value)
    {
        if ($value === null) {
            return 1.0;
        }

        return (float)$value;
    }

    /**
     * Accessor for $this->final_price (price * rate)
     *
     * @return float|int
     */
    protected function _getFinalPrice()
    {
        return $this->price * $this->rate;
    }
}
