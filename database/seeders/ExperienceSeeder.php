<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::all();

        // Profile 1
        Experience::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Kampus Mengajar',
           'start_at' => '2021',
           'end_at' => '2021',
           'place' => 'SD Negeri 2 Pasarejo',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Experience::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Baswara',
           'start_at' => '2022',
           'end_at' => 'Sekarang',
           'place' => 'Universitas Sebelas Maret',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Experience::create([
           'profile_id' => $profile[0]->id,
           'title' => 'SEMESTA UNS',
           'start_at' => '2022',
           'end_at' => 'Sekarang',
           'place' => 'Universitas Sebelas Maret',
           'description' => 'Penjelasan Singkat / Description',
        ]);

    }
}
