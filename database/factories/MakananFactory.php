<?php

use Faker\Generator as Faker;

$factory->define(App\Makanan::class, function (Faker $faker) {
    return [
        'kode_produk' => $faker->word,
        'nama' => $faker->name, 
        'kode_isi' => $faker->uuid, 
        'harga' => $faker->randomNumber, 
        'jenis' => 'Makanan', 
        'id_dapur' => 1
    ];
});
