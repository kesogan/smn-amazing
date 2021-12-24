<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtEqquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_eqquipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('art_id');
            $table->unsignedBigInteger('eqquipment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('art_eqquipments');
    }
}
