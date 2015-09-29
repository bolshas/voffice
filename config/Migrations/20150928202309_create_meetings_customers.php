<?php
use Migrations\AbstractMigration;

class CreateMeetingsCustomers extends AbstractMigration
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
        $table = $this->table('meetings_customers');
        $table->addColumn('meeting_id',  'integer', ['default' => null, 'limit' => 11, 'null' => false])
              ->addColumn('customer_id', 'integer', [ 'default' => null, 'limit' => 11, 'null' => false])
              ->create();
    }
}
