<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always',
                ],
                'Users.afterLogin' => [
                    'lastLogin' => 'always'
                ]
            ]
        ]);	
        
        $this->hasMany('Customers');
		$this->belongsToMany('Departments', ['joinTable' => 'departments_users']);
		$this->belongsToMany('Meetings', ['joinTable' => 'meetings_users']);
	}
	
	public function validationDefault(Validator $validator)
	{
		$validator->requirePresence('name', 'create')
		          ->notEmpty('name', 'Please provide your name.')
		          ->requirePresence('email', 'create')
		          ->add('email', 'validFormat', ['rule' => 'email', 'message' => 'Email must be valid.'])
		          ->notEmpty('email', 'Please provide your email')
	              ->requirePresence('password', 'create')
		          ->notEmpty('password', 'Please provide your password');
		return $validator;
	}
}