<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::first('id');

        Skill::create([
            'profile_id' => $profile->id,
            'name' => 'menulis',
            'icon' => 'bi bi-pencil',
            'description' => 'Skill menulis'
        ]);

        Skill::create([
            'profile_id' => $profile->id,
            'name' => 'Membaca',
            'icon' => 'bi bi-book',
            'description' => 'Skill membaca'
        ]);

        Skill::create([
            'profile_id' => $profile->id,
            'name' => 'Design',
            'icon' => 'bi bi-easel',
            'description' => 'Skill Melukis'
        ]);

        Skill::create([
            'profile_id' => $profile->id,
            'name' => 'Ngoding',
            'icon' => 'bi bi-braces',
            'description' => 'Skill Ngoding'
        ]);

        Skill::create([
            'profile_id' => $profile->id,
            'name' => 'Traveler',
            'icon' => 'bi bi-train-front',
            'description' => 'Skill Traveler'
        ]);

    }
}
