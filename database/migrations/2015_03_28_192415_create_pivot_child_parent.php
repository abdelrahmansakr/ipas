<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotChildParent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('child_parent', function(Blueprint $table){

			$table->integer('child_id')->unsigned();
			$table->foreign('child_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('child_parent');
	}

}
