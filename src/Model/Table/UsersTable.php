<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
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
	
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['email'], 'This email is already in use.'));
		return $rules;
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
		          //->add($rules->isUnique(['username', 'account_id']));
		return $validator;
	}

	public function findMeetings(Query $query, array $options) 
	{
		$query//->hydrate(false)
			  //->select(['id', 'name'])
			  ->where(['id' => $options['Users.id']])
			  ->contain(['Meetings' => function($q) use ($options) {
			  		return $q//->select(['id', 'title'])
			  				 //->autoFields(false)
			  				 ->contain(['Users' => function($q) use ($options) {
			  				 	return $q;//->select(['id', 'name'])
			  				 			 //->where(['Users.id !=' => $options['Users.id']])
			  				 			 //->autoFields(false);
			  				 }])
			  				 ->contain(['Customers' => function($q) use ($options) {
								return $q;//->select(['id', 'name'])
										 //->autoFields(false);
			  				 }]);
			  }]);
		
		return $query;
	}
}