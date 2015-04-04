<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_user', function(Blueprint $table)
		{

			$table->integer('quiz_id')->unsigned();
			$table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('quiz_user');

	}

}
