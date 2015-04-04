<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slide_user', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('story_id')->unsigned();
			$table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');

			$table->integer('slide_id')->unsigned();
			$table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->string('recordingURL');

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
		Schema::drop('slide_user');
	}

}
