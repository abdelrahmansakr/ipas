<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyStoryIdToSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slides', function(Blueprint $table)
		{
			$table->integer('story_id')->unsigned();
			$table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade')->before('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slides', function(Blueprint $table)
		{
			$table->dropColumn('story_id');
		});
	}

}
