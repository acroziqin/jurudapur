<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('harga')->nullable();
            $table->string('jenis')->nullable();
            $table->integer('id_dapur');
            $table->timestamps();
        });

        DB::table('kue')->insert(array(
            ['nama'     => 'Tarches',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Bolu Sakura',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Lapis Mawar',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Sus',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Sus Bawah',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],//
            ['nama'     => 'Kue Tok',
             'harga'    => 3000,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Lumpur',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Bikang',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Brownis',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Proll Tape',
             'harga'    => 2500,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],//
            ['nama'     => 'Pie Buah',
             'harga'    => 3000,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Pie Brownis',
             'harga'    => 3000,
             'jenis'    => 'Basah Manis',
             'id_dapur' => 1],
            ['nama'     => 'Pastel',
             'harga'    => 3000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Lemper',
             'harga'    => 2000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Lumpia',
             'harga'    => 2500,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Risoles',
             'harga'    => 2500,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Sosis Solo',
             'harga'    => 2500,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],//
            ['nama'     => 'Riso Mayo',
             'harga'    => 3000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Gabin Gurih',
             'harga'    => 3000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Macharoni',
             'harga'    => 3000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],
            ['nama'     => 'Tahu Fantasi',
             'harga'    => 3000,
             'jenis'    => 'Basah Gurih',
             'id_dapur' => 1],//
            ['nama'     => 'Sosis Solo',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Pastel',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Mayo',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Sus',
            'jenis'    => null,
             'harga'    => 2000,
             'id_dapur' => 3],
            ['nama'     => 'Donat Coklat',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Donat Gula',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Lumpur',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3],
            ['nama'     => 'Bolu Kukus',
             'harga'    => 2000,
             'jenis'    => null,
             'id_dapur' => 3]
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
        Schema::dropIfExists('kue');
    }
}
