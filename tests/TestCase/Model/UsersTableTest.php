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
		
	}
	
	public function testValidationAcceptsCorrectData() 
	{
		$data = [
			'name' => 'Pranas',
			'email' => 'pranas@gmail.com',
			'password' => 'ADAaaksdj23'
		];
		$newUser = TableRegistry::get('Users')->newEntity($data);
		$query =  TableRegistry::get('Users')->save($newUser);
		$this->assertInstanceOf('Cake\ORM\Entity', $query);
	}
	public function testValidationRejectsBadName() 
	{
		$data = [
			'name' => '',
			'email' => 'pranas@gmail.com',
			'password' => 'ADAaaksdj23'
		];
		$newUser = TableRegistry::get('Users')->newEntity($data);
		$query = TableRegistry::get('Users')->save($newUser);
		$this->assertFalse($query);
	}	
	public function testValidationRejectsBadEmail() 
	{
		$data = [
			'name' => 'Vardenis Pavardenis',
			'email' => 'pranas@gmail',
			'password' => 'ADAaaksdj23'
		];
		$newUser = TableRegistry::get('Users')->newEntity($data);
		$query = TableRegistry::get('Users')->save($newUser);
		$this->assertFalse($query);
	}
	public function testValidationRejectsBadPassword() 
	{
		$data = [
			'name' => 'Vardenis Pavardenis',
			'email' => 'pranas@gmail',
			'password' => ''
		];
		$newUser = TableRegistry::get('Users')->newEntity($data);
		$query = TableRegistry::get('Users')->save($newUser);
		$this->assertFalse($query);
	}
}