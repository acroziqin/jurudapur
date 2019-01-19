<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->timestamps();
        });

        DB::table('isi')->insert(array(
            ['nama' => 'Nasi Putih'],
            ['nama' => 'Tumis Tahu'],
            ['nama' => 'Tumis Tempe'],
            ['nama' => 'Sayur'],
            ['nama' => 'Sambal'],
            ['nama' => 'Telur Dadar'],
            ['nama' => 'Telur Ceplok'],
            ['nama' => 'Ayam Suwir'],
            ['nama' => 'Ayam Goreng'],
            ['nama' => 'Ayam Crispy'],
            ['nama' => 'Jamur Tiram'],
            ['nama' => 'Kerupuk'],
            ['nama' => 'Telur Rebus'],
            ['nama' => 'Nasi Goreng'],
            ['nama' => 'Sosis'],
            ['nama' => 'Tumis Jamur'],
            ['nama' => 'Tempe'],
            ['nama' => 'Tahu'],
            ['nama' => 'Ayam Kecap'],
            ['nama' => 'Capjay'],
            ['nama' => 'Mie'],
            ['nama' => 'Bihun'],
            ['nama' => 'Ayam Bali'],
            ['nama' => 'Tumis Wortel'],
            ['nama' => 'Sambal Goreng'],
            ['nama' => 'Acar'],
            ['nama' => 'Ayam Rendang'],
            ['nama' => 'Sayur Tewel'],
            ['nama' => 'Sambal Ijo'],
            ['nama' => 'Daun Singkong'],
            ['nama' => 'Ayam Betutu'],
            ['nama' => 'Kering Tempe'],
            ['nama' => 'Nasi Gurih'],
            ['nama' => 'Urap'],
            ['nama' => 'Ayam Bakar'],
            ['nama' => 'Ayam Balado'],
            ['nama' => 'Orem-orem'],
            ['nama' => 'Peyek'],
            ['nama' => 'Nasi Kuning'],
            ['nama' => 'Perkedel'],
            ['nama' => 'Telur Bulat'],
            ['nama' => 'Mie Pangsit'],
            ['nama' => 'Gorengan'],
            ['nama' => 'Buah'],
            ['nama' => 'Tempe Bakar'],
            ['nama' => 'Ayam Geprek'],
            ['nama' => 'Tahu Tempe Goreng'],
            ['nama' => 'Tahu Tempe Bumbu Bali'],
            ['nama' => 'Telur Balado'],
            ['nama' => 'Usus Ayam'],
            ['nama' => 'Ikan Tongkol'],
            ['nama' => 'Lele Pedas'],
            ['nama' => 'Ikan Pari'],
            ['nama' => 'Ikan Tuna'],
            ['nama' => 'Ayam'],
            ['nama' => 'Daging'],
            ['nama' => 'Kentang Goreng'],
            ['nama' => 'Mie Goreng'],
            ['nama' => 'Nasi Merah'],
            ['nama' => 'Ayam Opor'],
            ['nama' => 'Sambal Bawang'],
            ['nama' => 'Sambal Tomat'],
            ['nama' => 'Sambal Teri'],
            ['nama' => 'Tempe Goreng'],
            ['nama' => 'Tahu Bulat'],
            ['nama' => 'Bakwan Jagung'],
            ['nama' => 'Tumis Wortel Buncis'],
            ['nama' => 'Buncis Tempe Dadu'],
            ['nama' => 'Terong Balado'],
            ['nama' => 'Tumis Buncis'],
            ['nama' => 'Sayur Lodeh'],
            ['nama' => 'Bakmi'],
            ['nama' => 'Ampela Ayam']
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
        Schema::dropIfExists('isi');
    }
}
