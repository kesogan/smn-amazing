<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatouageTechniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatouage_techniques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tatouage_id');
            $table->unsignedBigInteger('technique_id');
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
        Schema::dropIfExists('tatouage_techniques');
    }
}
