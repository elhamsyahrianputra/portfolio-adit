<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'title' => 'Tutorial Mengeja bahasa Indonesia',
            'slug' => 'tutorial-mengeja-bahasa-indonesia',
            'cover_url' => 'video/cover-image/cover-video.jpg',
            'video_url' => 'video/video-file/video1.mp4',
            'author' => 'Adit',
            'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsum voluptatibus quaerat ab quos nisi odio modi maxime eum totam quam odit eveniet, voluptatum assumenda minima dolores ea, quia, error quae repellat corrupti debitis nulla eligendi nobis? Recusandae natus voluptates earum, accusantium praesentium impedit dolorum harum laborum, et dolores doloremque at fuga illo tempora blanditiis labore maxime explicabo. Architecto laboriosam maiores nobis commodi dolorum sint debitis. In ad fugiat ratione. Similique ex voluptatum aperiam rerum voluptatem molestias quos repellendus, totam alias vitae voluptate saepe distinctio, officiis cum corporis enim necessitatibus architecto soluta, illo dolorum eaque! Consequuntur laboriosam quam ab, praesentium recusandae mollitia sequi sint quasi repudiandae similique. Maxime, facilis libero optio ipsum provident ipsa obcaecati velit sapiente enim voluptatem voluptatum neque officia iste maiores quam dolor cumque veritatis recusandae fugiat dolores officiis magnam? Nihil placeat voluptatum, dicta qui deserunt nisi alias sequi, autem fugit vitae atque ut quibusdam ullam laudantium.',
        ]);
        Video::create([
            'title' => 'Tutorial tutorial',
            'slug' => 'tutorial-tutorial',
            'cover_url' => 'video/cover-image/cover-video.jpg',
            'video_url' => 'video/video-file/video1.mp4',
            'author' => 'Adit',
            'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsum voluptatibus quaerat ab quos nisi odio modi maxime eum totam quam odit eveniet, voluptatum assumenda minima dolores ea, quia, error quae repellat corrupti debitis nulla eligendi nobis? Recusandae natus voluptates earum, accusantium praesentium impedit dolorum harum laborum, et dolores doloremque at fuga illo tempora blanditiis labore maxime explicabo. Architecto laboriosam maiores nobis commodi dolorum sint debitis. In ad fugiat ratione. Similique ex voluptatum aperiam rerum voluptatem molestias quos repellendus, totam alias vitae voluptate saepe distinctio, officiis cum corporis enim necessitatibus architecto soluta, illo dolorum eaque! Consequuntur laboriosam quam ab, praesentium recusandae mollitia sequi sint quasi repudiandae similique. Maxime, facilis libero optio ipsum provident ipsa obcaecati velit sapiente enim voluptatem voluptatum neque officia iste maiores quam dolor cumque veritatis recusandae fugiat dolores officiis magnam? Nihil placeat voluptatum, dicta qui deserunt nisi alias sequi, autem fugit vitae atque ut quibusdam ullam laudantium.',
        ]);
    }
}
