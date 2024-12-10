<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Polls seed.
 */
class PollsSeed extends AbstractSeed
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
                'name' => 'Best Drama Series',
                'photo_url' => null,
                'options' => [
                    ['name' => 'The Boys', 'photo_url' => '/img/the-boys.jpg'],
                    ['name' => 'Bridgerton', 'photo_url' => '/img/bridgerton.jpeg'],
                    ['name' => 'The Crown', 'photo_url' => '/img/the-crown.jpeg'],
                    ['name' => 'The Handmaid’s Tale', 'photo_url' => '/img/hmt.jpg'],
                    ['name' => 'Lovecraft Country', 'photo_url' => '/img/love-country'],
                    ['name' => 'The Mandalorian', 'photo_url' => '/img/the-mandalorian.jpg'],
                ]
            ],
            [
                'name' => 'Best Drama Series 2',
                'photo_url' => null,
                'options' => [
                    ['name' => 'The Boys', 'photo_url' => '/img/the-boys.jpg'],
                    ['name' => 'Bridgerton', 'photo_url' => '/img/bridgerton.jpeg'],
                    ['name' => 'The Crown', 'photo_url' => '/img/the-crown.jpeg'],
                    ['name' => 'The Handmaid’s Tale', 'photo_url' => '/img/hmt.jpg'],
                    ['name' => 'Lovecraft Country', 'photo_url' => '/img/love-country'],
                    ['name' => 'The Mandalorian', 'photo_url' => '/img/the-mandalorian.jpg'],
                ]
            ],
        ];
        $Model = \Cake\ORM\TableRegistry::getTableLocator()->get('Polls');
        foreach ($data as $poll) {
            $entity = $Model->newEntity($poll, ['associated' => 'Options']);
            $Model->saveOrFail($entity);
        }
    }
}
