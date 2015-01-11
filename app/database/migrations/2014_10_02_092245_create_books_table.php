<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name', 128);
			$table->string('author', 128);
			$table->string('language', 32);
			$table->string('publication_date', 32);
			$table->string('literary_genre', 32);
			$table->string('ISBN', 17)->unique();
			$table->string('programming_language', 32)->nullable(true);
			$table->string('added_by', 32);
			$table->string('description', 1024);
			$table->string('thumbnailPath', 64);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
