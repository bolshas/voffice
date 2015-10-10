<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class DepartmentsFixture extends TestFixture
{
	public $import = ['table' => 'departments'];
	
	public $records = [
		[
			'name' => 'Root',
			'parent_id' => 0,
			'lft' => 1,
			'rght' => 12
		],
		[
			'name' => 'Corporate',
			'parent_id' => 1,
			'lft' => 3,
			'rght' => 6
		],
		[
			'name' => 'Leasing',
			'parent_id' => 2,
			'lft' => 4,
			'rght' => 5
		],
		[
			'name' => 'Retail',
			'parent_id' => 1,
			'lft' => 7,
			'rght' => 10
		],
		[
			'name' => 'Cards',
			'parent_id' => 4,
			'lft' => 8,
			'rght' => 9
		],
		[
			'name' => 'SEB',
			'parent_id' => 0,
			'lft' => 2,
			'rght' => 11
		],
	];
}
