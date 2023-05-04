<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Portfolio::create([
            'image'	=> '',
            'title'	=> 'graphic-design',
            'icon'	=> '<i class="fa fa-desktop" aria-hidden="true"></i>',
            'description'	=> '',
        ]);
        \App\Models\Portfolio::create([
            'image'	=> '',
            'title'	=> 'android',
            'icon'	=> '<i class="fa fa-android" aria-hidden="true"></i>',
            'description'	=> '',
        ]);
        \App\Models\Portfolio::create([
            'image'	=> '',
            'title'	=> 'web-development',
            'icon'	=> '<i class="fa fa-laptop" aria-hidden="true"></i>',
            'description'	=> '',
        ]);
        \App\Models\Portfolio::create([
            'image'	=> '',
            'title'	=> 'adobe',
            'icon'	=> '<i class="fa fa-picture-o" aria-hidden="true"></i>',
            'description'	=> '',
        ]);
        \App\Models\Portfolio::create([
            'image'	=> '',
            'title'	=> 'languages',
            'icon'	=> '<i class="fa fa-language" aria-hidden="true"></i>',
            'description'	=> '',
        ]);
    }
}
