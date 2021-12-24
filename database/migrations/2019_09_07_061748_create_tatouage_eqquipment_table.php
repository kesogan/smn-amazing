<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatouageEqquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatouage_eqquipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tatouage_id');
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
        Schema::dropIfExists('tatouage_eqquipments');
    }
}
