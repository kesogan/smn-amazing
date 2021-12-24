<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartItemTable extends Migration {

	public function up()
	{
		Schema::create('cart_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('price');
			$table->integer('quantity');
            $table->integer('cart_id')->unsigned()->nullable();
            $table->integer('order_id')->unsigned()->nullable();
			$table->integer('art_id')->unsigned()->nullable();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cart_item');
	}
}
