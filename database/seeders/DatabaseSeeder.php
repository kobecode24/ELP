<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ProgrammingLanguagesSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SpokenLanguagesTableSeeder;
use Database\Seeders\ProgrammingLanguagesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //run all seeders
        $this->call([
            RoleSeeder::class,
            SpokenLanguagesTableSeeder::class,
            ProgrammingLanguagesSeeder::class,
            ProgrammingLanguagesTableSeeder::class,
        ]);
    }

}
