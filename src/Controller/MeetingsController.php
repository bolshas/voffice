<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;

class MeetingsController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
    
	public function index() 
	{
		$query = $this->Meetings->find('all')->contain(['Users', 'Customers']);
		$this->set('meetings', $this->paginate($query));	
	}
	
	public function view($id = null) 
	{
		if ($id) {
			$meeting = $this->Meetings->find('all')
			                          ->where(['Meetings.id' => $id])
			                          ->contain(['Users', 'Customers'])
			                          ->first();
			if (!$meeting) {
				$this->Flash->error('The meeting id ' . $id . ' was not found');
				return $this->redirect(['action' => 'index']);
			}
			$this->set('meeting', $meeting);
		}
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
			$newMeeting = $this->Meetings->newEntity($this->request->data);
			if ($newMeeting->errors()) { //model validation errors have occured.
				$this->set('errors', $newMeeting->errors());
			}
			if ($this->Meetings->save($newMeeting)) {
				$this->Flash->success('Meeting saved.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('An error has occured while saving the customer.');
		} 
		$this->set('users', $this->Meetings->Users->find('list'));
		$this->set('customers', $this->Meetings->Customers->find('list'));
	}
	
	public function delete($id = null)
	{
		if ($id) {
			if ($this->Meetings->delete($this->Meetings->get($id))) {
				$this->Flash->success('Meeting has been deleted.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Unable to delete the meeting.');
			return $this->redirect(['action' => 'index']);
		}
	}
	
	public function edit($id = null)
	{
		if ($id) {
			$meeting = $this->Meetings->get($id);
			$this->set('meeting', $meeting);
			if ($this->request->is('post')) {
				$this->Meetings->patchEntity($meeting, $this->request->data);
				if($meeting->errors()) {
					$this->set('errors', $meeting->errors());
				}
				if ($this->Meetings->save($meeting)) {
					$this->Flash->success('Meeting updated.');
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error('Unable to update the meeting.');
			}
		}
	}
}