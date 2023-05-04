<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project::create([
            'image'	=> '',
            'title'	=> 'Aurofil Laravel 10 Bootstrap',
            'type'	=> 'web',
            'description'	=> '',
        ]);
        \App\Models\Project::create([
            'image'	=> '',
            'title'	=> 'Aurofil Laravel 10 ReactJS',
            'type'	=> 'web',
            'description'	=> '',
        ]);
    }
}
