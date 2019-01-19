<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOngkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkir', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dapur');
            $table->string('lokasi');
            $table->integer('ongkos');
        });

        DB::table('ongkir')->insert(array(
            ['dapur'  => 'Blimbing',
             'lokasi' => 'Blimbing',
             'ongkos' => 0],
            ['dapur'  => 'Blimbing',
             'lokasi' => 'Kedungkandan',
             'ongkos' => 19800],
            ['dapur'  => 'Blimbing',
             'lokasi' => 'Klojen',
             'ongkos' => 9800],
            ['dapur'  => 'Blimbing',
             'lokasi' => 'Lowokwaru',
             'ongkos' => 11600],
            ['dapur'  => 'Blimbing',
             'lokasi' => 'Sukun',
             'ongkos' => 15800],
            ['dapur'  => 'Kedungkandang',
             'lokasi' => 'Blimbing',
             'ongkos' => 19600],
            ['dapur'  => 'Kedungkandang',
             'lokasi' => 'Kedungkandang',
             'ongkos' => 0],
            ['dapur'  => 'Kedungkandang',
             'lokasi' => 'Klojen',
             'ongkos' => 14400],
            ['dapur'  => 'Kedungkandang',
             'lokasi' => 'Lowokwaru',
             'ongkos' => 26800],
            ['dapur'  => 'Kedungkandang',
             'lokasi' => 'Sukun',
             'ongkos' => 17400],
            ['dapur'  => 'Klojen',
             'lokasi' => 'Blimbing',
             'ongkos' => 9800],
            ['dapur'  => 'Klojen',
             'lokasi' => 'Kedungkandang',
             'ongkos' => 13800],
            ['dapur'  => 'Klojen',
             'lokasi' => 'Klojen',
             'ongkos' => 0],
            ['dapur'  => 'Klojen',
             'lokasi' => 'Lowokwaru',
             'ongkos' => 14400],
            ['dapur'  => 'Klojen',
             'lokasi' => 'Sukun',
             'ongkos' => 8200],
            ['dapur'  => 'Lowokwaru',
             'lokasi' => 'Blimbing',
             'ongkos' => 12000],
            ['dapur'  => 'Lowokwaru',
             'lokasi' => 'Kedungkandang',
             'ongkos' => 26600],
            ['dapur'  => 'Lowokwaru',
             'lokasi' => 'Klojen',
             'ongkos' => 13200],
            ['dapur'  => 'Lowokwaru',
             'lokasi' => 'Lowokwaru',
             'ongkos' => 0],
            ['dapur'  => 'Lowokwaru',
             'lokasi' => 'Sukun',
             'ongkos' => 20600],
            ['dapur'  => 'Sukun',
             'lokasi' => 'Blimbing',
             'ongkos' => 16000],
            ['dapur'  => 'Sukun',
             'lokasi' => 'Kedungkandan',
             'ongkos' => 17000],
            ['dapur'  => 'Sukun',
             'lokasi' => 'Klojen',
             'ongkos' => 7000],
            ['dapur'  => 'Sukun',
             'lokasi' => 'Lowokwaru',
             'ongkos' => 17400],
            ['dapur'  => 'Sukun',
             'lokasi' => 'Sukun',
             'ongkos' => 0]
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
        Schema::dropIfExists('ongkir');
    }
}
