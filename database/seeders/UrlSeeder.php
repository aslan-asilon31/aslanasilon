<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Url::create([
            'image'	=> '',
            'title'	=> 'Website',
            'description'	=> '',
        ]);

        \App\Models\Url::create([
            'image'	=> '',
            'title'	=> 'Github',
            'description'	=> '',
        ]);

        \App\Models\Url::create([
            'image'	=> '',
            'title'	=> 'Youtube',
            'description'	=> '',
        ]);
    }
}
