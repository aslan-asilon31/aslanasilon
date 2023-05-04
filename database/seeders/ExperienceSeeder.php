<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Experience::create([
            'image'	=> '',
            'company_name'	=> 'PT NADYNE MEDIA TAMA',
            'company_web'	=> 'https://www.nadyne.com/',
            'company_address'	=> 'Jl. Benda Raya 92, Kemang Jakarta Selatan 12560 Indonesia',
            'work_start'	=> 'July 2022',
            'work_end'	=> 'November 2022',
            'work_position'	=> 'Backend Developer',
            'status'	=> 'Internship',
        ]);

        \App\Models\Experience::create([
            'image'	=> '',
            'company_name'	=> 'PT TRIPASYSFO DEVELOPMENT',
            'company_web'	=> 'https://tripasysfo.com/',
            'company_address'	=> 'Villa Insani Regency, Jl. Moch. Kahfi II No.14, Kota Jakarta Selatan, 12630',
            'work_start'	=> 'November 2022',
            'work_end'	=> '-',
            'work_position'	=> 'Fullstack Developer',
            'status'	=> 'Worker',
        ]);
    }
}
