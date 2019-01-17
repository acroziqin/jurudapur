<?php

use Faker\Generator as Faker;

$factory->define(App\Kue::class, function (Faker $faker) {
    return [
        'kode_produk' => $faker->code, 
        'nama' => $faker->name, 
        'harga' => $faker->randomNumber(4), 
        'jenis' => 'Kue', 
        'id_dapur' => 1
    ];
});
