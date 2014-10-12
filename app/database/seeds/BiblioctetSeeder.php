<?php

class BiblioctetSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Clear the database
		DB::table('books')->delete();

		// Seeds :
		$bookGoT = book::create(array(
			'name'				=> 'A Game of Thrones',
			'author'			=> 'George R.R. Martin',
			'publication_date'	=> '1996',
			'literary_genre'	=> 'Fantasy',
			'ISBN'				=> '0-553-10354-7'
		));

		$bookH2G2 = book::create(array(
			'name'				=> 'The Hitchhiker\'s Guide to the Galaxy',
			'author'			=> 'Douglas Adams',
			'publication_date'	=> '1978',
			'literary_genre'	=> 'Comedy science fiction',
			'ISBN'				=> '0-330-25864-8'
		));

		$bookDahlia = book::create(array(
			'name'				=> 'The Black Dahlia',
			'author'			=> 'James Ellroy',
			'publication_date'	=> '1988',
			'literary_genre'	=> 'Crime fiction',
			'ISBN'				=> '0-330-25864-8'
		));

		$this->command->info('Books created');


		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	}

}
