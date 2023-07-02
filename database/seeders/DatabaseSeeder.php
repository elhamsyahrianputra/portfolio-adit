<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProfileSeeder::class,
            CarouselSeeder::class,
            UserSeeder::class,
            SkillSeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
            CollaborationSeeder::class,
            PortfolioSeeder::class,
            ArticleSeeder::class,
            VideoSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
