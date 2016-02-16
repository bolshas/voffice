<?php
use Migrations\AbstractMigration;

class FakeMeetings extends AbstractMigration
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
		$faker->addProvider(new \Faker\Provider\DateTime($faker));
		
		$populator = new \Faker\ORM\CakePHP\Populator($faker);
		$populator->addEntity('Meetings', 50, [
			'date' => function() use ($faker) { return $faker->dateTimeThisYear(); },
			'created' => null,
			'modified' => null
		]);
		$populator->execute(['validate' => false]);
    }
}
