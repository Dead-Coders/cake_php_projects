<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSchedules extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('schedules');
        $table->addColumn('movie_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('screen_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('start_time', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('close_time', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('movie_id', 'movies', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'CASCADE',
        ]);
        $table->addForeignKey('screen_id', 'screens', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'CASCADE',
        ]);
        $table->create();
    }
}
