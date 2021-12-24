<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('video', function(Blueprint $table) {
			$table->foreign('art_id')->references('id')->on('art')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('art_user', function(Blueprint $table) {
			$table->foreign('art_id')->references('id')->on('art')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('art_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('event', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('video', function(Blueprint $table) {
			$table->dropForeign('Video_art_id_foreign');
		});
		Schema::table('event', function(Blueprint $table) {
			$table->dropForeign('Event_user_id_foreign');
		});
		Schema::table('art_user', function(Blueprint $table) {
			$table->dropForeign('art_user_art_id_foreign');
		});
		Schema::table('art_user', function(Blueprint $table) {
			$table->dropForeign('art_user_user_id_foreign');
		});
	}
}