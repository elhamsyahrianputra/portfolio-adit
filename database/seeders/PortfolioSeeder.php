<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = Profile::all('id');

        Portfolio::create([
            'profile_id' => $profiles[0]->id,
            'name' => "Baswara Logo Design",
            'portfolio_image' => 'portfolio/portfolio-image/portfolio-4.jpg',
            'description' => "Kami membuat sebuah logo yang elegan untuk client kami yaitu baswara",
            'category' => 'Grafis Design',
            'client_project' => 'Baswara',
            'project_date' => Carbon::parse('2022-10-10'),
            'project_url' => null,
         ]);

        Portfolio::create([
            'profile_id' => $profiles[1]->id,
            'name' => "Website Baswara",
            'portfolio_image' => 'portfolio/portfolio-image/portfolio-2.jpg',
            'description' => "Membuat sebuah website interaktif dan menarik yang dibangun menggunakan Framework Laravel dan Bootrstrap",
            'category' => 'Website Developer',
            'client_project' => 'Baswara',
            'project_date' => Carbon::parse('2022-05-17'),
            'project_url' => 'baswara-uns.com',
         ]);
    }
}
