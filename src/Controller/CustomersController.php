<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;

class CustomersController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // $this->Auth->allow(['add']);
    }
    
	public function index() 
	{
		$query = $this->Customers->find('all')->contain(['Users']);
		$this->set('customers', $this->paginate($query));		
	}
	
	public function view($id = null) 
	{
		if ($id) {
			try {
				$customer = $this->Customers->find('all')->contain(['Users'])->first();
			} catch (RecordNotFoundException $ex) {
				$this->Flash->error($ex->getMessage());
				return $this->redirect(['action' => 'index']);
			}
			$this->set('customer', $customer);
		}
	}
	
	public function edit($id = null) 
	{
		if ($id) {
			$customer = $this->Customers->get($id);
			$this->set('customer', $customer);
			if ($this->request->is('post')) {
				$updatedData = array_filter($this->request->data); //remove empty fields from data.
				$this->Customers->patchEntity($customer, $updatedData);
				if($customer->errors()) {
					$this->set('errors', $customer->errors());
				}
				if ($this->Customers->save($customer)) {
					$this->Flash->success('Customer updated.');
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error('Unable to update the customer.');
			}
		}
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
			$newCustomer = $this->Customers->newEntity($this->request->data);
			if ($newCustomer->errors()) { //model validation errors have occured.
				$this->set('errors', $newCustomer->errors());
			}
			if ($this->Customers->save($newCustomer)) {
				$this->Flash->success('Customer saved.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('An error has occured while saving the customer.');
		} 
		$this->set('users', $this->Customers->Users->find('list'));

	}
	
	public function delete($id = null)
	{
		if ($id) {
			if ($this->Customers->delete($this->Customers->get($id))) {
				$this->Flash->success('Customer has been deleted.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Unable to delete the customer.');
			return $this->redirect(['action' => 'index']);
		}
	}
}