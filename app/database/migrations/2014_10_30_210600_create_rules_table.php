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
	
			$table->engine = 'InnoDB';
					
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('language_id');
			$table->string('description');
			$table->string('letters');
			$table->boolean('can_end')->default(true);
			$table->boolean('can_start')->default(true);
	
		});
	    	
				
		Schema::table('rules', function($table)
		{
			$table->foreign('language_id')->references('id')->on('languages'); 
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
