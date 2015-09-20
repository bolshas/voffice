<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

class UsersControllerTest extends IntegrationTestCase
{
	public $fixtures = ['app.users'];
	
	public function setUp()
	{
		
	}
	
	public function testIndex() 
	{
		$this->get('/users');
		$this->assertResponseOk();
		$this->assertResponseContains('Add user');
	}
	
	public function testAdd() 
	{
		$data = [
			'name' => 'Pranas',
			'email' => 'pranas@gmail.com',
			'password' => 'ADAaaksdj23'
		];
		$this->post('/users/add', $data);
		
		$this->assertResponseSuccess();
		
		$users = TableRegistry::get('Users');
        $query = $users->find()->where(['email' => $data['email']]);
        $this->assertEquals(1, $query->count());
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
	public function testValidation() 
	{
		
	}
}