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
            $table->increments('id');//Ada
            $table->integer('user_id');//Ada
            $table->string('menu_type');//Ada
            $table->integer('menu_id');//Ada
            $table->string('order_number');
            $table->string('ingredients_code')->nullable();
            $table->integer('quantity');//Ada
            $table->string('phone_number');//Ada
            $table->string('delivery_date');//Ada
            $table->string('payment_method');//Ada
            $table->string('payment_location');//Ada
            $table->string('shipment_method');//Ada
            $table->string('shipment_subdistrict')->nullable();//Ada
            $table->string('shipment_location');//Ada
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
        Schema::dropIfExists('orders');
    }
}
