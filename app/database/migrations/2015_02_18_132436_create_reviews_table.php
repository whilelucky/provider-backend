<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foriegn('user_id')->references('id')->on('users');
			$table->integer('service_id')->unsigned();
			$table->foriegn('service_id')->references('id')->on('service_types')
				->onDelete('cascade')->onUpdate('cascade');
			$table->longText('description');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews'); 
	}

}