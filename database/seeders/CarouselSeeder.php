<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create(
            [
                'image_url' => 'carousel/carousel-image/christy.jpg'
            ]
        );
        Carousel::create(
            [
                'image_url' => 'carousel/carousel-image/christy2.jpg'
            ]
        );
        Carousel::create(
            [
                'image_url' => 'carousel/carousel-image/christy3.jpg'
            ]
        );
    }
}
