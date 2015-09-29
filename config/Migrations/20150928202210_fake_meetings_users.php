<?php
use Migrations\AbstractMigration;

class FakeMeetingsUsers extends AbstractMigration
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

		$populator = new \Faker\ORM\CakePHP\Populator($faker);
		$populator->addEntity('Meetings_Users', 50, [
			'meeting_id' => function() use ($faker) { return $faker->numberBetween(1, 50); },
			'user_id' =>    function() use ($faker) { return $faker->numberBetween(1, 50); },
		]);
		$populator->execute(['validate' => false]);
		
    }
}
