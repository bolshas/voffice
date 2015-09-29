<?php

use Phinx\Migration\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function change()
    {
    	$table = $this->table('users');
        $table->addColumn('name', 'string', ['default' => null, 'limit' => 255, 'null' => false])
        	  ->addColumn('email', 'string', ['default' => null, 'limit' => 255, 'null' => false])
              ->addColumn('password', 'string', ['default' => null, 'limit' => 255, 'null' => false])
              ->addColumn('lastLogin', 'datetime', ['default' => null, 'null' => true])
              ->addColumn('created', 'datetime', ['default' => null, 'null' => false])
              ->addColumn('modified', 'datetime', ['default' => null, 'null' => false])
              ->addIndex(['email'], ['name' => 'UNIQUE_NAME', 'unique' => true])
              ->create();
    }
}
