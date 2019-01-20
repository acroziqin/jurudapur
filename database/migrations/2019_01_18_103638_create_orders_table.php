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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('menu_type');
            $table->integer('menu_id');
            $table->string('order_number');
            $table->string('ingredients_code')->nullable();
            $table->integer('quantity');
            $table->string('phone_number');
            $table->string('delivery_date');
            $table->string('payment_method');
            $table->string('payment_location');
            $table->string('shipment_method');
            $table->string('shipment_sub-district');
            $table->string('shipment_location');
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
