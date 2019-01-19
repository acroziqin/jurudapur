<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('harga')->nullable();            
            $table->integer('id_dapur');
            $table->timestamps();
        });

        DB::table('tambahan')->insert(array(
            ['nama'     => 'Nasi Putih',
             'harga'    => 2500,
             'id_dapur' => 1],
            ['nama'     => 'Tumis Tahu',
             'harga'    => 1200,
             'id_dapur' => 1],
            ['nama'     => 'Tumis Tempe',
             'harga'    => 1200,
             'id_dapur' => 1],
            ['nama'     => 'Sayur',
             'harga'    => 4200,
             'id_dapur' => 1],
            ['nama'     => 'Telur Dadar',
             'harga'    => 3200,
             'id_dapur' => 1],
            ['nama'     => 'Telur Ceplok',
             'harga'    => 3200,
             'id_dapur' => 1],
            ['nama'     => 'Ayam Suwir',
             'harga'    => 6000,
             'id_dapur' => 1],
            ['nama'     => 'Ayam Goreng',
             'harga'    => 6000,
             'id_dapur' => 1],
            ['nama'     => 'Ayam Crispy',
             'harga'    => 6000,
             'id_dapur' => 1],
            ['nama'     => 'Kerupuk',
             'harga'    => 500,
             'id_dapur' => 1],
            ['nama'     => 'Buah',
             'harga'    => 2500,
             'id_dapur' => 1]
        ));

        DB::disableQueryLog();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tambahan');
    }
}
