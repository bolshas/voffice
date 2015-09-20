<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
	}
	
	public function validationDefault(Validator $validator)
	{
		$validator->requirePresence('name')
		          ->notEmpty('name', 'Please provide your name.')
		          ->requirePresence('email')
		          ->add('email', 'validFormat', ['rule' => 'email', 'message' => 'Email must be valid.'])
		          ->notEmpty('email', 'Please provide your email')
	              ->requirePresence('password')
		          ->notEmpty('password', 'Please provide your password');
		return $validator;
	}
}