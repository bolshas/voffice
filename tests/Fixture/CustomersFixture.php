<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

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
		],
		[
			'id' => 2,
			'name' => 'UAB Trys paršeliai',
			'address' => 'Vilniaus g. 57, Kaunas',
			'phoneNumber' => '+370 652 473 57',
			'email' => 'info@trysparseliai.lt',
			'corporateId' => '16467971',
			'user_id' => 1
		],
		[
			'id' => 3,
			'name' => 'UAB Keturi ereliai',
			'address' => 'Stasio g. 57, Kaunas',
			'phoneNumber' => '+370 642 473 57',
			'email' => 'info@keturiereliai.lt',
			'corporateId' => '6568774',
			'user_id' => 2
		]
	];
}	
