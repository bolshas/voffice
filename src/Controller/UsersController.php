<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;

class UsersController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register']);
    }
    
	public function index() 
	{
		$this->set('users', $this->paginate($this->Users));		
	}
	
	public function test() 
	{
	}
	
	public function view($id = null) 
	{
		if ($id) {
			try {
				$user = $this->Users->get($id, ['contain' => 'Meetings']);
			} catch (RecordNotFoundException $ex) {
				$this->Flash->error($ex->getMessage());
				return $this->redirect(['action' => 'index']);
			}
			// $this->set('user', $user);
			$this->set('user', $this->Users->find('Meetings', ['Users.id' => $id])->first());
		}
	}
	
	public function edit($id = null) 
	{
		if ($id) {
			$user = $this->Users->get($id);
			$this->set('user', $user);
			if ($this->request->is('post')) {
				$updatedData = array_filter($this->request->data); //remove empty fields from data.
				$this->Users->patchEntity($user, $updatedData);
				if($user->errors()) {
					$this->set('errors', $user->errors());
				}
				if ($this->Users->save($user)) {
					$this->Flash->success('User updated.');
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error('Unable to update the user.');
			}
		}
	}
	
	public function register()
	{
		$this->set('errors', []);
		$this->viewBuilder()->layout('login');
		if ($this->request->is('post')) {
			$newUser = $this->Users->newEntity($this->request->data);
			
			if ($this->Users->save($newUser)) {
				$this->Flash->success('User saved.');
				return $this->redirect(['action' => 'login']);
			}
			if ($newUser->errors()) { //model validation errors have occured.
				$this->set('errors', $newUser->errors());
			} 
			// $this->Flash->error('An error has occured while saving the user.');
		}
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
			$newUser = $this->Users->newEntity($this->request->data);
			if ($newUser->errors()) { //model validation errors have occured.
				$this->set('errors', $newUser->errors());
			}
			if ($this->Users->save($newUser)) {
				$this->Flash->success('User saved.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('An error has occured while saving the user.');
		} 
	}
	
	public function delete($id = null)
	{
		if ($id) {
			if ($this->Users->delete($this->Users->get($id))) {
				$this->Flash->success('User has been deleted.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Unable to delete the user.');
			return $this->redirect(['action' => 'index']);
		}
	}
	
	public function login() 
	{
		$this->viewBuilder()->layout('login');
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
		        $entity = $this->Users->get($user['id']);
		        $this->Users->touch($entity, 'Users.afterLogin'); // Update login timestamp (in entity)
				if ($this->Users->save($entity)) {
					return $this->redirect($this->Auth->redirectUrl());
				}
			}
			$this->Flash->error('incorrect data');
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
}