<?php

use Faker\Generator as Faker;

$factory->define(App\Minuman::class, function (Faker $faker) {
    return ['kode_produk' => $faker->word, 
        'nama' => $faker->name, 
        'harga' => $faker->randomNumber(4), 
        'jenis' => 'Minuman', 
        'id_dapur' => 1
    ];
});
