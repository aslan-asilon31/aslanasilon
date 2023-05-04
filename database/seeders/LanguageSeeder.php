<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Language::create([
            'image'	=> '',
            'title'	=> 'English',
            'description'	=> '',
        ]);

        \App\Models\Language::create([
            'image'	=> '',
            'title'	=> 'Japanese',
            'description'	=> 'Undestanding Hiragana and katakana alphabet and some Kanji',
        ]);

        \App\Models\Language::create([
            'image'	=> '',
            'title'	=> 'Mandarin',
            'description'	=> 'Undestanding some daily sentence',
        ]);
    }
}
