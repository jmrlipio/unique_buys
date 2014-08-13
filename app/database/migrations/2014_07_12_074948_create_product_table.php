<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{	
			$table->increments('id');
			$table->unsignedInteger('category_id');	
			$table->string('product_name');
			$table->string('slug');
			$table->string('description');
			$table->string('isFeatured')->default('false');
			$table->decimal('price', 6, 2);
			$table->boolean('availability')->default(1);
			$table->string('image');
			$table->timestamps();
		});
		Schema::table('product', function($table) {
      		$table->foreign('category_id')->references('id')->on('product_category');
   		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
