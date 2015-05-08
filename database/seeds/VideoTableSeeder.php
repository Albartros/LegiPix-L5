<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Video;

class VideoTableSeeder extends Seeder {

    public function run()
    {
        // Create a Faker object
        $faker = Faker::create();

        // Create 4 Halo videos
        $videos = array('tHQiYPiNVEE', '9rd8FWUCCZk', 'V9D2HzbT9Pc', '4KKWsPZjjjQ');

        foreach( $videos as $video )
        {
            Video::create(array(
                'name' => $faker->sentence(6),
                'video_id' => $video,
            ));
        }
    }
}
