<?php

namespace Database\Seeders;

use App\Models\Collaboration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collaboration::create([
            'name' => 'Baswara',
            'url' => 'https://baswara-uns.com',
            'image_url' => 'collaboration/collaboration-image/baswara.png'
        ]);
        
        Collaboration::create([
            'name' => 'Narasi Budaya',
            'url' => 'https://narasibudaya.com',
            'image_url' => 'collaboration/collaboration-image/narasi-budaya.png'
        ]);
    }
}
