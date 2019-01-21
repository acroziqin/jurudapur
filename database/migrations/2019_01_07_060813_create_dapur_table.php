<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDapurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->double('rating')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('kuota')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto-header')->nullable();
            $table->timestamps();
        });

        DB::table('dapur')->insert(array(
            ['nama' => 'Bu Sri',
             'deskripsi' => 'Dapur berpengalaman, banyak menu pilihan dan harga terjangkau. Cocok buat kamu yang cari kateringan low budget dengan variasi menu yang bermacam-macam.',
             'lokasi' => 'Lowokwaru'],
             ['nama' => 'Bu Rini',
             'deskripsi' => 'Dapur berpengalaman dan harga terjangkau banget cocok buat kamu yang cari kateringan low budget.',
             'lokasi' => 'Kedungkandang'],
             ['nama' => 'Aufar',
             'deskripsi' => 'Dapur spesialis jajan-jajan yang berpengalaman dan terjangkau.',
             'lokasi' => 'Sukun'],
             ['nama' => 'Pak Angga',
             'deskripsi' => 'Dapur berpengalaman dengan masakan yang berkelas.',
             'lokasi' => 'Blimbing'],
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
        Schema::dropIfExists('dapur');
    }
}
