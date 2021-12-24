<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTable extends Migration {

	public function up()
	{
		Schema::create('event', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->text('description');
			$table->datetime('date');
			// $table->bigInteger('user_id')->nullable();
			$table->integer('user_id')->unsigned()->nullable();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('event');
	}
}
