<?php
namespace App\Model\Table;

use Cake\ORM\Query;
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
        $this->belongsToMany('Customers', ['joinTable' => 'meetings_customers']);
	}
	
	public function findMetCustomers(Query $query, array $options) 
	{
		$query->contain(['Users.Customers'])->matching('Users', function ($q) use ($options) {
			return $q->where(['Users.id' => $options['Users.id']]);
		});
		return $query;
	}
}