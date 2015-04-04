<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
    		$table->string('parent/kid')->after('password');
			$table->string('US/UK')->after('parent/kid');
    		$table->date('dateOfBirth')->after('US/UK');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
    		$table->dropColumn('dateOfBirth');
    		$table->dropColumn('US/UK');
    		$table->dropColumn('parent/kid');
		});
	}

}
