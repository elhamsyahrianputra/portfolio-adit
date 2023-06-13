<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Profile::create([
            'name' => 'Muhammad Aditya Wisnu Wardana',
            'profile_image' => 'profile/profile_image/fTKNrd2mXcq9wGkK4bWZcFXynKXjChp64Dd2IHUS.jpg',
            'email' => 'adit@gmail.com',
            'birthplace' => 'Surakarta, Jawa Tengah, Indonesia',
            'birthdate' => Carbon::parse('2002-01-01'),
            'phone' => '+6281345587891',
            'description' =>  "I'm Collage Student At Sebelas Maret University",
            'detail' => 'Saya merupakan seorang mahasiswa yang berkuliah di Universitas Sebelas Maret dengan Prodi Pendidikan Bahasa Indonesia',
        ]);

        Profile::create([
            'name' => 'Elham Syahrian Putra',
            'profile_image' => 'profile/profile_image/jA3iwx9XcXA7kw7S1GUuIkw6TFJHlZLpvYexjMGv.jpg',
            'email' => 'elham@gmail.com',
            'birthplace' => 'Tenggarong, Kalimantan Timur, Indonesia',
            'birthdate' => Carbon::parse('2002-04-22'),
            'phone' => '+6281345587891',
            'description' =>  "I'm Collage Student At Sebelas Maret University",
            'detail' => 'Saya merupakan seorang mahasiswa yang berkuliah di Universitas Sebelas Maret dengan Prodi Pendidikan Bahasa Indonesia',
        ]);
    }
}
