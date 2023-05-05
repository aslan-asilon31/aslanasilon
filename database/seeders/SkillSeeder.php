<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Skill::create([
            'image'	=> '',
            'title'	=> 'PHP',
            'description'	=> 'php.com',
            'description'	=> '',
        ]);
        
        \App\Models\Skill::create([
            'image'	=> '',
            'title'	=> 'Laravel',
            'description'	=> 'laravel.com',
        ]);

        \App\Models\Skill::create([
            'image'	=> '',
            'title'	=> 'Javascript',
            'description'	=> 'javascript.com',
        ]);

        \App\Models\Skill::create([
            'image'	=> '',
            'title'	=> 'ReactJS',
            'description'	=> 'reactjs.org',
        ]);
    }
}
