<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Countdown;

class CountdownTableSeeder extends Seeder {

    public function run()
    {
        // Create a Faker object
        $faker = Faker::create();

        // Create a fake countdown
        Countdown::create(array(
            'name' => $faker->sentence(3),
            'released_at' => $faker->dateTimeBetween('+1 month', '+6 months'),
            'thumbnail' => 'dummy.jpg',
        ));
    }
}
