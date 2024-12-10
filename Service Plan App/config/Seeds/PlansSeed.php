<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Plans seed.
 */
class PlansSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Starter',
                'price' => 15,
                'description' => '30 minutes section week|Access to Fitness&Fashion podcast|10% of Wellness Discount',
            ],
            [
                'name' => 'Pro',
                'price' => 29,
                'description' => '60 minutes section week|Access to Fitness&Fashion podcast|10% of Wellness Discount',
            ],
            [
                'name' => 'Master',
                'price' => 50,
                'description' => '120 minutes section week|Access to Fitness&Fashion podcast|20% of Wellness Discount',
            ],
        ];

        $table = $this->table('plans');
        $table->insert($data)->save();
    }
}
