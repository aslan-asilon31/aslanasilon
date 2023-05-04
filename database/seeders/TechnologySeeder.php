<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Technology::create([
            'image'	=> '',
            'title'	=> 'Laravel 10',
            'description'	=> '',
        ]);
        \App\Models\Technology::create([
            'image'	=> '',
            'title'	=> 'ReactJS',
            'description'	=> '',
        ]);
    }
}
