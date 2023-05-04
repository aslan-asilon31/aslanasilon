<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\About::create([
            'image'	=> '',
            'bio'	=> 'I am a software engineer who creates high-performing applications with organized architecture.',
            'email'	=> 'sulaslansetiawan1@gmail.com',
            'phone'	=> '082123070516',
            'address'	=> 'Jl Sarmili N0.31, Kebayoran Lama Utara, Kebayoran Lama, Jakarta Selatan, DKI Jakarta, Indonesia',
            'language'	=> '',
        ]);
    }
}
