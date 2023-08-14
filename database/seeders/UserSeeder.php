<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name'	=> 'aslanadmin',
            'email'	=> 'aslanadmin@gmail.com',
            'password'	=> bcrypt('aslanadmin'),
            'role'	=> 'admin',
        ]);

        \App\Models\User::create([
            'name'	=> 'visitors',
            'email'	=> 'visitors@gmail.com',
            'password'	=> bcrypt('visitors'),
            'role'	=> 'visitor',
        ]);
    }
}
