<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('rule_rule', function($table) {

				$table->engine = 'InnoDB';
		
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('rule_id');
			$table->unsignedInteger('follows_id');
		
		});
	    	
				
		Schema::table('rule_rule', function($table)
		{
			$table->foreign('rule_id')->references('id')->on('rules'); 
			$table->foreign('follows_id')->references('id')->on('rules'); 
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rule_rule');
	}

}
