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
		$children = $this->Departments->find('children', ['for' => 1])
		                              ->find('threaded')
		                              ->contain(['Users'])
		                              ->toArray();
		$this->set('children', $children);
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
		if ($id) {
			$departments = $this->Departments->find('treelist');
			$department = $this->Departments->get($id);
			$this->set('departments', $departments);
			$this->set('department', $department);
			if ($this->request->is('post')) {
				$this->Departments->patchEntity($department, $this->request->data);
				if($department->errors()) {
					$this->set('errors', $department->errors());
				}
				if ($this->Departments->save($department)) {
					$this->Flash->success('Department updated.');
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error('Unable to update the department.');
			}
		}
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
		if ($id) {
			if ($this->Departments->delete($this->Departments->get($id))) {
				$this->Flash->success('Department has been deleted.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Unable to delete the department.');
			return $this->redirect(['action' => 'index']);
		}
	}
}