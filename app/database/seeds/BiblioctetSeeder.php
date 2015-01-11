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
		$bookCompil = book::create(array(
			'name'					=>	'Compilers: Principles, Techniques, and Tools, Second Edition',
			'author'				=>	'Alfred V. Aho;Monica S. Lam;Ravi Sethi;Jeffrey D. Ullman',
			'language'				=>	'English',
			'publication_date'		=>	'2006',
			'literary_genre'		=>	'Programming',
			'ISBN'					=>	'0-201-10088-6',
			'programming_language'	=>	'Divers',
			'added_by'				=>	'Admin',
			'description'			=>	'Compilers: Principles, Techniques, and Tools is a computer science textbook by Alfred V. Aho, Monica S. Lam, Ravi Sethi, and Jeffrey D. Ullman about compiler construction. Although more than two decades have passed since the publication of the first edition, it is widely regarded as the classic definitive compiler technology text.',
			'thumbnailPath'			=>	'dragonBook2nd.jpg'
		));

		$bookC = book::create(array(
			'name'					=>	'The C Programming Language, Second Edition',
			'author'				=>	'Brian Kernighan;Dennis Ritchie',
			'language'				=>	'English',
			'publication_date'		=>	'1988',
			'literary_genre'		=>	'Programming',
			'ISBN'					=>	'0-13-110362-8',
			'programming_language'	=>	'C',
			'added_by'				=>	'Admin',
			'description'			=>	'The bible of C programming.',
			'thumbnailPath'			=>	'cProgramming2nd.jpg'
		));

		$bookJava = book::create(array(
			'name'					=>	'Effective Java (2nd Edition)',
			'author'				=>	'Joshua Bloch',
			'language'				=>	'English',
			'publication_date'		=>	'2008',
			'literary_genre'		=>	'Programming',
			'ISBN'					=>	'0-32-135668-3',
			'programming_language'	=>	'Java',
			'added_by'				=>	'Admin',
			'description'			=>	'Java for Journeyman',
			'thumbnailPath'			=>	'effectiveJava2nd.jpg'
		));

		$bookGoT = book::create(array(
			'name'					=>	'A Game of Thrones',
			'author'				=>	'George R.R. Martin',
			'language'				=>	'English',
			'publication_date'		=>	'1996',
			'literary_genre'		=>	'Fantastique',
			'ISBN'					=>	'0-553-10354-7',
			'programming_language'	=>	'NULL',
			'added_by'				=>	'Admin',
			'description'			=>	'Short description of the book (1024 signs).',
			'thumbnailPath'			=>	'aGameOfThrones.jpg'
		));

		$bookH2G2 = book::create(array(
			'name'					=>	'The Hitchhiker\'s Guide to the Galaxy',
			'author'				=>	'Douglas Adams',
			'language'				=>	'English',
			'publication_date'		=>	'1978',
			'literary_genre'		=>	'Science-fiction, humour',
			'ISBN'					=>	'0-330-25864-8',
			'programming_language'	=>	'NULL',
			'added_by'				=>	'Admin',
			'description'			=>	'Short description of the book (1024 signs).',
			'thumbnailPath'			=>	'h2g2.png'
		));

		$bookDahlia = book::create(array(
			'name'					=>	'The Black Dahlia',
			'author'				=>	'James Ellroy',
			'language'				=>	'English',
			'publication_date'		=>	'1988',
			'literary_genre'		=>	'Thriller',
			'ISBN'					=>	'0-89296-206-2',
			'programming_language'	=>	'NULL',
			'added_by'				=>	'Admin',
			'description'			=>	'Short description of the book (1024 signs).',
			'thumbnailPath'			=>	'blackDahlia.jpg'
		));

		$this->command->info('Books created');


		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	}

}
