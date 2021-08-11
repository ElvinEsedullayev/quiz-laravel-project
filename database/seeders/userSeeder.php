<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;//str istifade etmek ucundu
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             \App\Models\User::insert([//factory icinde yazmisdiq,xeta verirdi..getirdik bura
            'name' => 'elvin',
            'email' => 'alvinnnn162@gmail.com',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
         \App\Models\User::factory(10)->create();
    }
}
