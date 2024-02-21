<?php

namespace Database\Seeders;

use App\Models\SpokenLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpokenLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spokenLanguages = [
            ['name' => 'English'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'Arabic'],
            ['name' => 'Russian'],
            ['name' => 'Portuguese'],
            ['name' => 'German'],
        ];

        foreach ($spokenLanguages as $language) {
            SpokenLanguage::create($language);
        }
    }
}
