<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtTable extends Migration {

	public function up()
	{
		Schema::create('art', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 200);
			$table->text('description');
			$table->integer('price');
			$table->integer('quantity');
			$table->dateTime('start_at');
			$table->dateTime('end_at');
			$table->string('type', 100)->default("art");
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('art');
	}
}
