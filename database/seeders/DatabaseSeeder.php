<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DifficultySeeder::class,
            LevelSeeder::class,
            FormSeeder::class,
            // Otros seeders
        ]);
    }
}
