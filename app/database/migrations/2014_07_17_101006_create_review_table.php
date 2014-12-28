<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review', function(Blueprint $table)
		{
			$table->increments('review_id');			
			$table->integer('product_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('review_description',1000);
			$table->timestamps();
		});

		Schema::table('review', function($table) {
      		$table->foreign('product_id')->references('id')->on('product');
   		});

   		Schema::table('review', function($table) {
      		$table->foreign('user_id')->references('id')->on('users');
   		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('review');
	}

}
