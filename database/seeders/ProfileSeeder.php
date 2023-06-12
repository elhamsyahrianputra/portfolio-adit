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
            'email' => 'adit@gmail.com',
            'birthplace' => 'Surakarta, Jawa Tengah, Indonesia',
            'birthdate' => Carbon::parse('2002-01-01'),
            'phone' => '+6281345587891',
            'description' =>  'Hello my name is Muhammad Aditya Wisnu Wardana, you can call me Adit, Im Student collage at Sebelas Maret University',
        ]);

        Profile::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elham@gmail.com',
            'birthplace' => 'Tenggarong, Kalimantan Timur, Indonesia',
            'birthdate' => Carbon::parse('2002-04-22'),
            'phone' => '+6281345587891',
            'description' =>  'Hello my name is Elham Syahrian Putra, you can call me Adit, Im Student collage at Sebelas Maret University',
        ]);
    }
}
