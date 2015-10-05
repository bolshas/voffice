<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

class DepartmentsControllerTest extends IntegrationTestCase
{
	public $fixtures = ['app.departments'];
	
	public function setUp()
	{
		parent::setUp();
		
		$this->session([
			'Auth' => [
				'User' => [
					'id' => 1,
					'username' => 'testing'
				]
			]
		]);
		
		$this->Departments = TableRegistry::get('Departments');
        
        $this->Departments->save($this->Departments->newEntity(['name' => 'root']));
        $this->Departments->save($this->Departments->newEntity(['name' => 'corporate', 'parent_id' => 1]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'retail', 'parent_id' => 2]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'cards', 'parent_id' => 3]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'leasing', 'parent_id' => 2]));
        
        $this->data = ['name' => 'test department', 'parent_id' => 3];
	}
	
	public function tearDown()
	{
		unset ($this->session, $this->Departments, $this->data);
		parent::tearDown();
	}
	
	public function testIndex() 
	{
		$this->get('/departments');
		$this->assertResponseOk();
		$this->assertResponseContains('Add department');
		
		$this->assertResponseContains('--cards');
	}
	
	public function testAdd() 
	{
		$this->post('/departments/add', $this->data); //create a new department.
		$this->assertResponseSuccess();
		$this->assertSession('Department saved.', 'Flash.flash.0.message');
		$this->get('/departments/add');
		$this->assertResponseContains('leasing');
		
 //       $query = $this->users->find()->where(['email' => $this->data['email']]);
 //       $this->assertEquals(1, $query->count());
	// 	$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}

	// public function testView() 
	// {
	// 	$this->get('/users/view/1');
	// 	$this->assertResponseOk();
	// 	$this->assertResponseContains($this->user->email); // view shows the record of the user.
		
	// 	$this->get('/users/view/123123'); //try an unexisting record.
	// 	$this->assertResponseCode(302); // reposnse should be an error
	// }
	
	// public function testDelete()
	// {
	// 	$this->get('/users/delete/1'); // delete the user.
	// 	$query = $this->users->find()->where(['email' => $this->user->email]); //try to find the user by email.
 //       $this->assertEquals(0, $query->count());
	// }
	
	// public function testAdd() 
	// {
	// 	$this->post('/users/add', $this->data); //create a new user.
	// 	$this->assertResponseSuccess();
		
 //       $query = $this->users->find()->where(['email' => $this->data['email']]);
 //       $this->assertEquals(1, $query->count());
	// 	$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	// }
	
	// public function testEdit() 
	// {
	// 	$this->data['email'] = 'newemail@gmail.com';
	// 	$this->data['name'] = 'New Name';
		
	// 	$this->post('/users/edit/1', $this->data); //edit the new user
		
	// 	$user = $this->users->find('all')->where(['email' => $this->data['email']])->first(); //try to find the user by email.
		
	// 	$this->assertInstanceOf('Cake\ORM\Entity', $user, 'User data was not changed.'); //the user has been found.
	// 	$this->assertEquals($user->email, $this->data['email']);
	// 	$this->assertEquals($user->name, $this->data['name']);
	// }
	
	// public function testLogin() 
	// {
	// 	$this->get('/users/login');
	// 	$this->assertResponseOk();
	// 	$this->post('users/login', ['email' => $this->user->email, 'password' => 'Vlwrki28']); //login with new user data.
	// 	$this->assertResponseSuccess(); //the login has worked.
	// 	$this->assertRedirect('/'); //check if redirection works
	// 	$this->assertSession($this->user->email, 'Auth.User.email'); //check if the user has been logged in.
		
	// 	$this->user = $this->users->get(1); //requery the user.
		
	// 	$this->assertInstanceOf('Cake\I18n\Time', $this->user->lastLogin); //the logged in user should have a timestamp assigned.

	// 	$this->get('/users/logout'); //logo the new user out.
	// 	$this->data['password'] = 'wrong password'; //change the password to incorrect.
	// 	$this->post('users/login', $this->data); //login with incorrect password.
	// 	$this->assertSession(null, 'Auth.User.email'); //check if the user has not been logged in.
	// 	$this->assertResponseContains('incorrect data'); //the error message was shown.
	// }
	
	// public function testLogout()
	// {
	// 	$this->post('/users/add', $this->data); //create a new user.
	// 	$this->post('users/login', $this->data); //login with new user data.
	// 	$this->get('/users/logout'); //logout the new user.
	// 	$this->assertResponseSuccess(); //the logout has worked.
	// 	$this->assertRedirect('/users/login'); //check if redirection works
	// 	$this->assertSession(null, 'Auth.User.email'); //check if the user data has been unset from session.
	// }
}