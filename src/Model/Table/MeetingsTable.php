<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MeetingsTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always',
                ]
            ]
        ]);	

        $this->belongsToMany('Users', ['joinTable' => 'meetings_users']);
        $this->belongsToMany('Customers' ,['joinTable' => 'meetings_customers']);
	}
}