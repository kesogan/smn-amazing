<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartTable extends Migration {

	public function up()
	{
		Schema::create('cart', function(Blueprint $table) {
			$table->increments('id');
            $table->timestamps();
			$table->integer('user_id')->unsigned()->nullable();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cart');
	}
}
