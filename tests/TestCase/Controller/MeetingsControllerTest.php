<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class MeetingsontrollerTest extends IntegrationTestCase
{
	public $fixtures = ['app.users', 'app.customers', 'app.meetingsCustomers', 'app.meetingsUsers', 'app.meetings'];

	public function setUp()
	{
		parent::setUp();
		
		$this->session([
			'Auth' => [
				'User' => [
					'id' => 1,
					'name' => 'testing',
					'email' => 'testing@test.lt',
					'created' => new Time('2015-10-13 12:13:14'),
					'modified' => new Time('2014-11-14 13:14:15'),
					'modified' => new Time('2014-11-14 13:14:15'),
					'lastLogin' => new Time('2015-10-11 10:11:12')
				]
			]
		]);
		
		$this->data = [
			'title' => 'New Title',
			'description' => 'New description.',
			'users' => [
				'_ids' => [1]
			],
			'customers' => [
				'_ids' => [1]
			],
			
		];
		
		$this->customers = TableRegistry::get('Customers');
		$this->users = TableRegistry::get('Users');
		$this->meetings = TableRegistry::get('Meetings');
		$this->customer = $this->customers->get(1);
		$this->user = $this->users->get(1);
		$this->post('/meetings/add', $this->data); //create a new meeting. Not in fixture, because this way join tables get populated.
		$this->meeting = $this->meetings->get(1);
	}
	
	public function testIndex() 
	{
		$this->get('/meetings');
		$this->assertResponseOk();
		$this->assertResponseContains($this->meeting->title);
	}
	
	public function testView() 
	{
		$this->get('/meetings/view/1');
		$this->assertResponseOk();
	
		$this->assertResponseContains($this->meeting->title); // view shows the record of the meeting.
		$this->assertResponseContains($this->customer->name); // view shows the record of the customer.
		$this->assertResponseContains($this->user->name); // view shows the record of assigned user.
		
		$this->get('/meetings/view/123123'); //try an unexisting record.
		$this->assertResponseCode(302); // reposnse should be an error.
	}
	
	public function testAdd()
	{
		$this->data['title'] = 'Third New Title';
		$this->data['description'] = 'Third new description.';
		
		$this->post('/meetings/add', $this->data); //create a new meeting.
		$this->assertResponseSuccess();
		
        $query = $this->meetings->find()->where(['title' => $this->data['title']]);
        $this->assertEquals(1, $query->count());
		$this->assertRedirect(['controller' => 'Meetings', 'action' => 'index']);
	}
	
	public function testDelete()
	{
		$this->get('/meetings/delete/1'); // delete the user.
		$query = $this->meetings->find()->where(['id' => 1]); //try to find the customer by email.
        $this->assertEquals(0, $query->count());
	}
	
	public function testEdit() 
	{
		$this->data['title'] = 'Third New Title';
		$this->data['description'] = 'Third new description.';
		
		$this->post('/meetings/edit/1', $this->data); //edit the new customer
		
		$query = $this->meetings->find()->where(['title' => $this->data['title']]); //try to find the meeting by email.
		$this->assertEquals(1, $query->count());
	}
	
	public function tearDown()
	{
		parent::tearDown();
		unset ($this->session, $this->data, $this->customers, $this->customer, $this->users, $this->user, $this->meetings, $this->meeting);
	}
}