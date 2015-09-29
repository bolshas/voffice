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
	
	public function add()
	{
		
	}
}