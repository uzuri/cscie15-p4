<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rules', function($table) {

		$table->increments('id');
		$table->timestamps();
		$table->bigInteger('language_id');
		$table->string('description');
		$table->string('letters');
		$table->bigInteger('after_id');
		$table->boolean('can_end')->default(true);
		$table->boolean('can_start')->default(true);
	
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rules');
	}

}
