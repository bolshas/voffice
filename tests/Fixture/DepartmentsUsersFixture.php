<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class DepartmentsUsersFixture extends TestFixture
{
	public $import = ['table' => 'departments_users'];
	
	public $records = [
		[
			'department_id' => 6,
			'user_id' => 1,
			'title' => 'Test title'
		]
	];
}	
