<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class CustomersControllerTest extends IntegrationTestCase
{
	public $fixtures = ['app.users', 'app.customers'];

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
			'name' => 'UAB Septyni Zuikiai',
			'address' => 'Zenono g. 45, Kaunas',
			'phoneNumber' => '+370 780 343 56',
			'email' => 'info@septynizuikiai.lt',
			'corporateId' => '7676542',
			'user_id' => 1
		];
		
		$this->customers = TableRegistry::get('Customers');
		$this->users = TableRegistry::get('Users');
		$this->customer = $this->customers->get(1);
		$this->user = $this->users->get(1);
	}
	
	public function tearDown()
	{
		parent::tearDown();
		unset ($this->session, $this->data, $this->customers, $this->customer);
	}
	
	public function testIndex() 
	{
		$this->get('/customers');
		$this->assertResponseOk();
		$this->assertResponseContains('Add customer');
	}
	
	public function testView() 
	{
		$this->get('/customers/view/1');
		$this->assertResponseOk();
	
		$this->assertResponseContains($this->customer->email); // view shows the record of the customer.
		$this->assertResponseContains($this->user->name); // view shows the record of assigned user.
		
		$this->get('/customers/view/123123'); //try an unexisting record.
		$this->assertResponseCode(302); // response should be an error
	}
	
	public function testAdd()
	{
		$this->post('/customers/add', $this->data); //create a new customer.
		$this->assertResponseSuccess();
		
        $query = $this->customers->find()->where(['email' => $this->data['email']]);
        $this->assertEquals(1, $query->count());
		$this->assertRedirect(['controller' => 'Customers', 'action' => 'index']);
	}
	
	public function testDelete()
	{
		$this->get('/customers/delete/1'); // delete the user.
		$query = $this->customers->find()->where(['email' => $this->customer->email]); //try to find the customer by email.
        $this->assertEquals(0, $query->count());
	}
	
	public function testEdit() 
	{
		$this->post('/customers/edit/1', $this->data); //edit the new customer
		
		$customer = $this->customers->find('all')->where(['email' => $this->data['email']])->first(); //try to find the customer by email.
		
		$this->assertInstanceOf('Cake\ORM\Entity', $customer, 'Customer data was not changed.'); //the customer has been found.
		$this->assertEquals($customer->email, $this->data['email']);
		$this->assertEquals($customer->name, $this->data['name']);
	}
}