<?php

use Phinx\Migration\AbstractMigration;

class FakeUsers extends AbstractMigration
{
    public function change()
    {
    	$faker = \Faker\Factory::create();
		$faker->addProvider(new \Faker\Provider\Internet($faker));
		$populator = new \Faker\ORM\CakePHP\Populator($faker);
		$populator->addEntity('Users', 100, [
			'email' => function() use ($faker) { return $faker->unique()->email(); },
			'name' => function() use ($faker) { return $faker->firstName() . " " . $faker->lastName(); },
			'password' => function() use ($faker) { return $faker->password(); },
			'created' => null,
			'modified' => null
		]);
		$populator->execute(['validate' => false]);
    }
}
