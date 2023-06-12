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

        // Profile 2
        Experience::create([
           'profile_id' => $profile[1]->id,
           'title' => 'Praktek Kerja Industri',
           'start_at' => '2019',
           'end_at' => '2019',
           'place' => 'Bank BRI Cabang Tenggarong',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Experience::create([
           'profile_id' => $profile[1]->id,
           'title' => 'Operator',
           'start_at' => '2020',
           'end_at' => '2020',
           'place' => 'Susu Setia Indonesia',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Experience::create([
           'profile_id' => $profile[1]->id,
           'title' => 'Praktik Industri',
           'start_at' => '2022',
           'end_at' => '2022',
           'place' => 'PT Ekasa Teknologi Nusantara',
           'description' => 'Penjelasan Singkat / Description',
        ]);
    }
}
