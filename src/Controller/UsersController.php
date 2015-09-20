<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;

class UsersController extends AppController
{
	public function index() 
	{
		$generator = \Faker\Factory::create();
		$generator->addProvider(new \Faker\Provider\Internet($generator));

		$populator = new \Faker\ORM\CakePHP\Populator($generator);
		$populator->addEntity('Users', 1, [
			'email' => function() use ($generator) { return $generator->unique()->email(); },
			'name' => function() use ($generator) { return $generator->firstName() . " " . $generator->lastName(); },
			'password' => function() use ($generator) { return $generator->password(); },
			'created' => null,
			'modified' => null
		]);
		$populator->execute();
		$this->set('users', $this->paginate($this->Users));		
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
			$newUser = $this->Users->newEntity($this->request->data);
			if ($newUser->errors()) { //model validation errors have occured.
				$this->Flash->error('An error has occured while saving the user.');	
				$this->set('errors', $newUser->errors());
			}
			if ($this->Users->save($newUser)) {
				$this->Flash->success('User saved.');
				return $this->redirect(['action' => 'index']);
			}
			//$this->Flash->error('An error has occured while saving the user.');
			// return $this->redirect(['action' => 'index']);
		} else {
			$user = $this->Users->newEntity();
			$this->set('user', $user);
		}
	}
}