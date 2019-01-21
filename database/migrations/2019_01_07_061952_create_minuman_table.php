<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minuman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('harga')->nullable();
            $table->string('jenis')->nullable();
            $table->integer('id_dapur');
            $table->timestamps();
        });
        DB::table('minuman')->insert(array(
            ['nama'     => 'Es Teler',
             'harga'    => 5500,
             'jenis'    => 'Es Cup Sedang',
             'id_dapur' => 1],
            ['nama'     => 'Es Kopyor Sintetis',
             'harga'    => 4500,
             'jenis'    => 'Es Cup Sedang',
             'id_dapur' => 1],
            ['nama'     => 'Aneka Jus',
             'harga'    => 5500,
             'jenis'    => 'Es Cup Sedang',
             'id_dapur' => 1],
            ['nama'     => 'Aneka Kolak',
             'harga'    => 4500,
             'jenis'    => 'Es Cup Sedang',
             'id_dapur' => 1],
            ['nama'     => 'Dawet',
             'harga'    => 4500,
             'jenis'    => 'Es Cup Sedang',
             'id_dapur' => 1],
            ['nama'     => 'Es Buah',
             'harga'    => 5500,
             'jenis'    => 'Es Cup Sedang',
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
        Schema::dropIfExists('minuman');
    }
}
