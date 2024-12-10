<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateResponses extends AbstractMigration
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
        $table = $this->table('responses');
        $table->addColumn('option_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('option_id', 'options', 'id', [
            'update' => 'CASCADE',
            'delete' => 'RESTRICT',
        ]);
        $table->create();
    }
}
