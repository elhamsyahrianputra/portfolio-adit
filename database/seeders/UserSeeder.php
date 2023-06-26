<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        $profiles = Profile::all('id');

        User::create([
            'profile_id' => $profiles[0]->id,
            'email' => 'adit@gmail.com',
            'password' => Hash::make('qwertyui'),
        ]);
    }
}
