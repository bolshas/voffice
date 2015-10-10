<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

class DepartmentsControllerTest extends IntegrationTestCase
{
	public $fixtures = ['app.departments', 'app.users', 'app.departments_users'];
	
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
        $this->DepartmentsUsers = TableRegistry::get('DepartmentsUsers');
        $this->Users = TableRegistry::get('Users');
        
        $this->data = ['name' => 'test department', 'parent_id' => 3];
	}
	
	public function tearDown()
	{
		unset ($this->session, $this->Departments, $this->Users, $this->DepartmentsUsers, $this->data);
		parent::tearDown();
	}
	
	public function testIndex() 
	{
		$this->get('/departments');
		$this->assertResponseOk();
		$this->assertResponseContains('Add department');
		
		$children = $this->Departments->find('children', ['for' => 1])
		                              ->find('threaded')
		                              ->toArray();
		$this->assertResponseContains('Test title');
	}
	
	public function testAdd() 
	{
		$this->post('/departments/add', $this->data); //create a new department.
		$this->assertResponseSuccess();
		$this->assertSession('Department saved.', 'Flash.flash.0.message');
		$this->assertRedirect(['controller' => 'Departments', 'action' => 'index']);
		$this->get('/departments/index');
		$this->assertResponseContains($this->data['name']);
	}
	
	public function testDelete()
	{
		$this->get('/departments/delete/6'); // delete the top level department.
        $this->assertEquals(1, $this->Departments->find('all')->count()); //only root should remain.
        $this->assertEquals(0, $this->DepartmentsUsers->find('all')->count()); //all relationships should be deleted as well.
        $this->assertEquals(1, $this->Users->find('all')->count()); // user should not be deleted.
	}
	
	// public function testView() 
	// {
	// 	$this->get('/users/view/1');
	// 	$this->assertResponseOk();
	// 	$this->assertResponseContains($this->user->email); // view shows the record of the user.
		
	// 	$this->get('/users/view/123123'); //try an unexisting record.
	// 	$this->assertResponseCode(302); // reposnse should be an error
	// }
}