<?php
use Migrations\AbstractMigration;

class FakeCustomers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $faker = \Faker\Factory::create();
		$faker->addProvider(new \Faker\Provider\Company($faker));
		$faker->addProvider(new \Faker\Provider\Address($faker));
		$faker->addProvider(new \Faker\Provider\PhoneNumber($faker));
		$faker->addProvider(new \Faker\Provider\Internet($faker));
		
		$populator = new \Faker\ORM\CakePHP\Populator($faker);
		$populator->addEntity('Customers', 200, [
			'name' => function() use ($faker) { return $faker->unique()->company(); },
			'address' => function() use ($faker) { return $faker->unique()->address(); },
			'phoneNumber' => function() use ($faker) { return $faker->unique()->phoneNumber(); },
			'email' => function() use ($faker) { return $faker->unique()->companyEmail(); },
			'corporateId' => function() use ($faker) { return $faker->unique()->randomNumber(9); },
			// 'user_id' => function() use ($faker) { return $faker->realText(rand(22, 32)); },  //change by actual user ids.
			'created' => null,
			'modified' => null
		]);
		$populator->execute(['validate' => false]);
    }
}
