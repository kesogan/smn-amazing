<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeigneKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tatouage_eqquipments', function(Blueprint $table) {
            $table->foreign('tatouage_id')->references('id')->on('tatouages')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('eqquipment_id')->references('id')->on('eqquipments')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('art_eqquipments', function(Blueprint $table) {
            $table->foreign('art_id')->references('id')->on('art')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('eqquipment_id')->references('id')->on('eqquipments')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('art_supports', function(Blueprint $table) {
            $table->foreign('art_id')->references('id')->on('art')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('support_id')->references('id')->on('supports')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('art_techniques', function(Blueprint $table) {
            $table->foreign('art_id')->references('id')->on('art')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('technique_id')->references('id')->on('techniques')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('art_tatouages', function(Blueprint $table) {
            $table->foreign('art_id')->references('id')->on('art')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('tatouage_id')->references('id')->on('tatouages')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('event_tatouages', function(Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('event')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('tatouage_id')->references('id')->on('tatouages')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('tatouage_supports', function(Blueprint $table) {
            $table->foreign('support_id')->references('id')->on('supports')
                ->onDelete('restrict')
                ->onUpdate('restrict');
                $table->foreign('tatouage_id')->references('id')->on('tatouages')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });




        Schema::table('tatouage_techniques', function(Blueprint $table) {
            $table->foreign('tatouage_id')->references('id')->on('tatouages')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('technique_id')->references('id')->on('techniques')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('art_eqquipments', function(Blueprint $table) {
            $table->dropForeign(['art_id']);
            $table->dropForeign(['eqquipment_id']);
        });
		Schema::table('art_supports', function(Blueprint $table) {
            $table->dropForeign(['art_id']);
            $table->dropForeign(['support_id']);
        });
		Schema::table('art_techniques', function(Blueprint $table) {
            $table->dropForeign(['art_id']);
            $table->dropForeign(['technique_id']);
        });
		Schema::table('tatouage_techniques', function(Blueprint $table) {
            $table->dropForeign(['tatouage_id']);
            $table->dropForeign(['technique_id']);
        });
        Schema::table('tatouage_supports', function(Blueprint $table) {
            $table->dropForeign(['tatouage_id']);
            $table->dropForeign(['support_id']);
        });
        Schema::table('tatouage_eqquipments', function(Blueprint $table) {
            $table->dropForeign(['tatouage_id']);
            $table->dropForeign(['eqquipment_id']);
        });
        Schema::table('art_tatouages', function(Blueprint $table) {
            $table->dropForeign(['art_id']);
            $table->dropForeign(['tatouage_id']);
        });
        Schema::table('event_tatouages', function(Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropForeign(['tatouage_id']);
        });
    }
}
