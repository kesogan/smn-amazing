<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cart_id');
            $table->string('order_id');
            $table->string('used_api');
            $table->string('mail_on_bill');
            $table->string('full_name_bill');
            $table->string('tel_on_bill');
            $table->string('addres1_bill');
            $table->string('addres2_bill');
            $table->boolean('shipping');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
