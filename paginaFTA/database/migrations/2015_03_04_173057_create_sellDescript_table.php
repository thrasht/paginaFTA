<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellDescriptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sellDescript', function(Blueprint $table)
		{
			$table->integer('sell_id')->unsigned();
			$table->integer('article_id')->unsigned();
			$table->integer('amount');
			$table->float('subTotal');
			
			$table->foreign('sell_id')->references('id')->on('sells');
			$table->foreign('article_id')->references('id')->on('articles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sellDescript');
	}

}
