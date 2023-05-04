<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SocialMedia::create([
            'image'	=> '',
            'title'	=> 'Github',
            'url'	=> 'https://github.com/',
            'description'	=> '',
        ]);
        \App\Models\SocialMedia::create([
            'image'	=> '',
            'title'	=> 'Instagram',
            'url'	=> 'https://www.instagram.com/aslanasilon3',
            'description'	=> '',
        ]);
        \App\Models\SocialMedia::create([
            'image'	=> '',
            'title'	=> 'LinkedIn',
            'url'	=> 'https://www.linkedin.com/in/sulaslan-setiawan-b22013213/',
            'description'	=> '',
        ]);
    }
}
