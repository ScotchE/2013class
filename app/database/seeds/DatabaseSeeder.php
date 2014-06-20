<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('PilotesTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('ScratchesTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('CatsTableSeeder');
		$this->call('PointsTableSeeder');
	}

}
