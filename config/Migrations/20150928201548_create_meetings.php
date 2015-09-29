<?php
use Migrations\AbstractMigration;

class CreateMeetings extends AbstractMigration
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
        $table = $this->table('meetings');
        $table->addColumn('title',       'string',   ['default' => null, 'limit' => 255, 'null' => true])
              ->addColumn('description', 'text',     ['default' => null, 'null' => true])
              ->addColumn('created',     'datetime', ['default' => null, 'null' => false])
              ->addColumn('modified',    'datetime', ['default' => null, 'null' => false])
              ->create();
    }
}
