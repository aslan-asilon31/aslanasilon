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
            'company_about'	=> 'PENYEDIA INFRASTRUKTUR MENARA DAN JARINGAN YANG TERINTEGRASI',
            'company_name'	=> 'PT BALI TOWER SENTRA TBK',
            'company_web'	=> 'https://www.balitower.co.id/',
            'company_address'	=> ' Jl. Batu Ceper No.53, RW.1, Kb. Klp., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10120',
            'work_start'	=> 'Agustus 2022',
            'work_end'	=> '-',
            'work_position'	=> 'Staff Backend Developer',
            'status'	=> 'worker',
        ]);
        
        \App\Models\Experience::create([
            'image'	=> '',
            'company_about'	=> 'Perusahaan yang bergerak dalam penyediaan Solusi IT, berpengalaman dalam membangun sistem-sistem yang dibutuhkan oleh perusahaan-perusahaan seperti Software Akuntansi, Manajemen Gedung, dan Manajemen Produk & Inventaris.',
            'company_name'	=> 'PT TRIPASYSFO DEVELOPMENT',
            'company_web'	=> 'https://tripasysfo.com/',
            'company_address'	=> 'Villa Insani Regency, Jl. Moch. Kahfi II No.14, Kota Jakarta Selatan, 12630',
            'work_start'	=> '2022',
            'work_end'	=> '-',
            'work_position'	=> 'Fullstack Engineer',
            'status'	=> 'Worker',
        ]);

        \App\Models\Experience::create([
            'image'	=> '',
            'company_about'	=> 'PT. NADYNE MEDIA TAMA yang merupakan Perusahaan Marketing yang berdasarkan teknology digital yang sedang terus berkembang,',
            'company_name'	=> 'PT NADYNE MEDIA TAMA',
            'company_web'	=> 'https://www.nadyne.com/',
            'company_address'	=> 'Jl. Benda Raya 92, Kemang Jakarta Selatan 12560 Indonesia',
            'work_start'	=> '2022',
            'work_end'	=> '-',
            'work_position'	=> 'Fullstack Engineer',
            'status'	=> 'Internship',
        ]);

        \App\Models\Experience::create([
            'image'	=> '',
            'company_about'	=> 'Pusat Kesehatan Masyarakat',
            'company_name'	=> 'PUSKESMAS KECAMATAN KEMAYORAN',
            'company_web'	=> 'https://puskesmaskemayoran.net/',
            'company_address'	=> 'Puskesmas Kelurahan Hatapan Mulya, Jl. Harapan Mulia No.1, RT.12/RW.4, Harapan Mulya, Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10640',
            'work_start'	=> '2021',
            'work_end'	=> '',
            'work_position'	=> 'Fullstack Engineer',
            'status'	=> 'Internship',
        ]);

    }
}
