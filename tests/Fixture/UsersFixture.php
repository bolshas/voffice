<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class UsersFixture extends TestFixture
{
	public $import = ['table' => 'users'];
	
	public $records = [
		[
			'id' => 1,
			'name' => 'Andrius Bolsaitis',
			'email' => 'andrius.bolsaitis@gmail.com',
			'password' => '$2y$10$anHluusATzWM1HFr3Wgvsu3kyKndbY4Ko/tzXGtuNvlV.wkdIJnnC', //hashed Vlwrki28
			'lastLogin' => '2015-09-18 10:43:23',
			'created' => '2015-07-15 05:15:18',
			'modified' => '2015-08-23 11:45:17',
		],
		[
			'id' => 2,
			'name' => 'Petras Petraitis',
			'email' => 'petras.petraitis@gmail.com',
			'password' => '$2y$10$anHluusATzWM1HFr3Wgvsu3kyKndbY4Ko/tzXGtuNvlV.wkdIJnnC', //hashed Vlwrki28
			'lastLogin' => '2014-09-18 10:43:23',
			'created' => '2012-07-15 05:15:18',
			'modified' => '2013-08-23 11:45:17',
		]
	];
}
