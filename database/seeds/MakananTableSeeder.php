<?php

use Illuminate\Database\Seeder;

class MakananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Makanan::class, 10)->create();
    }
}
