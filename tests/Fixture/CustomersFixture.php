<?php
namespace App\Test\Fixture;

// use Cake\TestSuite\Fixture\TestFixture;

use Gourmet\Faker\TestSuite\Fixture\TestFixture;

class CustomersFixture extends TestFixture
{
	public $import = ['table' => 'customers'];
	
	
	public $records = [
		[
			'id' => 1,
			'name' => 'UAB Du gaideliai',
			'address' => 'Antakalnio g. 43, Vilnius',
			'phoneNumber' => '+370 650 123 45',
			'email' => 'info@dugaideliai.lt',
			'corporateId' => '794655671',
			'user_id' => 1
		]
	];
}	
