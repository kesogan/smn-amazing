<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtUsersTable extends Migration {
	public function up()
	{
		Schema::create('art_user', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('art_id')->unsigned();
			$table->integer('user_id')->unsigned();
            $table->softDeletes();
        });

	}
	public function down()
	{
		Schema::drop('art_user');
	}
}
