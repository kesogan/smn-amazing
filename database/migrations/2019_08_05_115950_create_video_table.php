<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideoTable extends Migration {

	public function up()
	{
		Schema::create('video', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('url', 255);
			$table->string('description', 255);
			$table->integer('art_id')->unsigned();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('video');
	}
}
