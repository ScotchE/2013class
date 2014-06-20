<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScratchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scratches', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('course_id');
			$table->integer('pilote_id');
			$table->string('categorie');
			$table->integer('scratch');
			$table->string('remarque');
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
		Schema::drop('scratches');
	}

}
