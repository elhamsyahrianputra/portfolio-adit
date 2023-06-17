<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elham@gmail.com',
            'subject' => 'Merekrut Tim baru',
            'message' => 'Saya ingin membuat sebuah tim, dan saya tertarik dengan portfolio anda, apakah anda tertarik, jika iya tolong balas ke email saya. Terima kasih',
        ]);

        Message::create([
            'name' => 'Muhammad Hardiansyah',
            'email' => 'ardian@gmail.com',
            'subject' => 'Portfolio yang bagus',
            'message' => 'Saya ingin membuat sebuah tim di bagian bla bla bla dan saya melihat portfolio anda. apakah anda tertarik?',
        ]);
    }
}
