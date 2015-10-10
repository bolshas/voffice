<?php
use Migrations\AbstractMigration;

class FakeDepartmentsUsers extends AbstractMigration
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
        $faker->addProvider(new \Faker\Provider\Lorem($faker));

		$populator = new \Faker\ORM\CakePHP\Populator($faker);
		$populator->addEntity('Departments_Users', 5, [
			'department_id' => function() use ($faker) { return $faker->numberBetween(1, 5); },
			'user_id' => function() use ($faker) { return $faker->numberBetween(1, 50); },
			'title' => function() use ($faker) { return $faker->text(50); },
		]);
		$populator->execute(['validate' => false]);
		
    }
}
