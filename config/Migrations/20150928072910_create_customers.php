<?php
use Migrations\AbstractMigration;

class CreateCustomers extends AbstractMigration
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
        $table = $this->table('customers');
        $table->addColumn('name',        'string',   ['default' => null, 'limit' => 255, 'null' => false])
	          ->addColumn('address',     'string',   ['default' => null, 'limit' => 255, 'null' => false])
              ->addColumn('phoneNumber', 'string',   ['default' => null, 'limit' => 255, 'null' => false])
		      ->addColumn('email',       'string',   ['default' => null, 'limit' => 255, 'null' => false])
              ->addColumn('corporateId', 'string',   ['default' => null, 'limit' => 255, 'null' => false])
              ->addColumn('user_id',     'integer',  ['default' => null, 'limit' => 11, 'null'  => false])
              ->addColumn('created',     'datetime', ['default' => null, 'null' => false])
              ->addColumn('modified',    'datetime', ['default' => null, 'null' => false])
              ->addIndex(['name'],        ['name' => 'UNIQUE_NAME',  'unique' => true])
              ->addIndex(['email'],       ['name' => 'UNIQUE_EMAIL', 'unique' => true])
              ->addIndex(['corporateId'], ['name' => 'CORPORATEID',  'unique' => false])
              ->create();
    }
}
