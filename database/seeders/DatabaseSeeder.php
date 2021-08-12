<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Str;//str istifade etmek ucundu
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('TRANCUTE TABLE users')//bu tablo icinde olan verileri silir
        $this->call([
            userSeeder::class,
            quizSeeder::class,
            questionSeeder::class,
            AnswerSeeder::class,
            ResultSeeder::class,
        ]);
        //factory(User::class,10)->create();  10 dene factori ile veri yukle
    }
}
