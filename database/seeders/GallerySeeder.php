<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Gallery::create([
            'image'	=> '',
            'title'	=> 'Database Design',
            'description'	=> '',
        ]);
    }
}
