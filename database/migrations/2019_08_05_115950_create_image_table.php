<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageTable extends Migration {

	public function up()
	{
		Schema::create('image', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('url', 255);
			$table->string('alt', 255)->nullable();
			$table->integer('imageable_id');
			$table->string('imageable_type');
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('image');
	}
}
