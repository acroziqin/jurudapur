<?php

use Illuminate\Database\Seeder;

class KueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kue::class, 10)->create();
    }
}
