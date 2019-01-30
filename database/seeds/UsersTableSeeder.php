<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => "Admin",
            'tipe'              => 1,
            'email'             => "admin@jurudapur.com",
            'email_verified_at' => now(),
            'password'          => bcrypt('jurudapur100sukses')
        ]);
        factory(App\User::class, 5)->create();
    }
}
