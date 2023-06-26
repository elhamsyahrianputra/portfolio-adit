<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationSeeder extends Seeder
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
        Education::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Sekolah Dasar',
           'start_at' => '2008',
           'end_at' => '2014',
           'place' => 'SD Negeri 1 Surakarta',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Education::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Sekolah Menengah Pertama',
           'start_at' => '2014',
           'end_at' => '2017',
           'place' => 'SMP Negeri 2 Surakarta',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Education::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Sekolah Menengah Atas',
           'start_at' => '2017',
           'end_at' => '2020',
           'place' => 'SMA Negeri 3 Surakarta',
           'description' => 'Penjelasan Singkat / Description',
        ]);
        Education::create([
           'profile_id' => $profile[0]->id,
           'title' => 'Sarjana',
           'start_at' => '2020',
           'end_at' => 'Sekarang',
           'place' => 'Fakultas Keguruan dan Ilmu Pendidikan, Universitas Sebelas Maret',
           'description' => 'Penjelasan Singkat / Description',
        ]);

    }
}
