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

		$this->call('BiblioctetSeeder');
		$this->command->info('Biblioctet table seeds planted!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeds planted!');
	}

}
