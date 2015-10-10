<?php
use Migrations\AbstractMigration;

class CreateDepartmentsUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('departments_users');
        $table->addColumn('department_id', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
              ->addColumn('user_id', 'integer', [ 'default' => null, 'limit' => 11, 'null' => false])
              ->addColumn('title', 'string', ['default' => null, 'limit' => 255, 'null' => false])
              ->create();
    }
}
