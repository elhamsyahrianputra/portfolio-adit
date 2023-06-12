<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Aditya Wisnu Wardana',
            'email' => 'adit@gmail.com',
            'password' => Hash::make('qwertyui'),
        ]);

        User::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elham@gmail.com',
            'password' => Hash::make('qwertyui'),
        ]);
    }
}
