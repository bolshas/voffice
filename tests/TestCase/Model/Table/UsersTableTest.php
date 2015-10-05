<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{
	public $fixtures  = ['app.users'];
	
	public function setUp() 
	{
		parent::setUp();
		$this->Users = TableRegistry::get('Users');
		$this->data = [
			'name' => 'Pranas',
			'email' => 'pranas@gmail.com',
			'password' => 'ADAaaksdj23'
		];
	}
	
	public function testValidationAcceptsCorrectData() 
	{
		$newUser = $this->Users->newEntity($this->data);
		$query =  $this->Users->save($newUser);
		$this->assertInstanceOf('Cake\ORM\Entity', $query);
	}
	public function testValidationRejectsBadName() 
	{
		$this->data['name'] = '';
		$newUser = $this->Users->newEntity($this->data);
		$query =  $this->Users->save($newUser);
		$this->assertFalse($query);
	}	
	public function testValidationRejectsBadEmail() 
	{
		$this->data['email'] = 'pranas@gmail';
		$newUser = $this->Users->newEntity($this->data);
		$query =  $this->Users->save($newUser);
		$this->assertFalse($query);
	}
	public function testValidationRejectsBadPassword() 
	{
		$this->data['password'] = '';
		$newUser = $this->Users->newEntity($this->data);
		$query =  $this->Users->save($newUser);
		$this->assertFalse($query);
	}
	public function testPasswordHashing()
	{
		$newUser = $this->Users->newEntity($this->data);
		$query = $this->Users->save($newUser);
		$this->assertNotEquals($this->data['password'], $query->password);
	}
	public function tearDown()
	{
		parent::tearDown();
		unset($this->Users, $this->data);
	}
}