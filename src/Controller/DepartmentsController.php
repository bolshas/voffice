<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;

class DepartmentsController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
    
	public function index() 
	{
		$this->set('departmentsList', $this->Departments->find('treeList', ['spacer' => '-']));
	}
	
	public function view($id = null) 
	{
		// if ($id) {
		// 	try {
		// 		$user = $this->Users->get($id);
		// 	} catch (RecordNotFoundException $ex) {
		// 		$this->Flash->error($ex->getMessage());
		// 		return $this->redirect(['action' => 'index']);
		// 	}
		// 	$this->set('user', $user);
		// }
	}
	
	public function edit($id = null) 
	{
		// if ($id) {
		// 	$user = $this->Users->get($id);
		// 	$this->set('user', $user);
		// 	if ($this->request->is('post')) {
		// 		$updatedData = array_filter($this->request->data); //remove empty fields from data.
		// 		$this->Users->patchEntity($user, $updatedData);
		// 		if($user->errors()) {
		// 			$this->set('errors', $user->errors());
		// 		}
		// 		if ($this->Users->save($user)) {
		// 			$this->Flash->success('User updated.');
		// 			return $this->redirect(['action' => 'index']);
		// 		}
		// 		$this->Flash->error('Unable to update the user.');
		// 	}
		// }
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
			$newDepartment = $this->Departments->newEntity($this->request->data);
			if ($newDepartment->errors()) { //model validation errors have occured.
				$this->set('errors', $newDepartment->errors());
			}
			if ($this->Departments->save($newDepartment)) {
				$this->Flash->success('Department saved.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('An error has occured while saving the department.');
		}
		
		$departments = $this->Departments->find('treelist');
		$this->set('departments', $departments);
	}
	
	public function delete($id = null)
	{
		// if ($id) {
		// 	if ($this->Users->delete($this->Users->get($id))) {
		// 		$this->Flash->success('User has been deleted.');
		// 		return $this->redirect(['action' => 'index']);
		// 	}
		// 	$this->Flash->error('Unable to delete the user.');
		// 	return $this->redirect(['action' => 'index']);
		// }
	}
}