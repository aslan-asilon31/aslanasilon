<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AboutSeeder::class);
        $this->call(ExperienceSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(TechnologySeeder::class);
        $this->call(UrlSeeder::class);
    }
}
