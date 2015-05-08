<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        // Create the Admin
        User::create(array(
            'email' => 'albartros@legipix.dev',
            'name' => 'albartros',
            'password' => Hash::make('1234'),
        ));

        // Create a Faker object
        $faker = Faker::create();

        // Create 5 fake users
        foreach( range(1, 5) as $item )
        {
            User::create(array(
                'email' => $faker->safeEmail,
                'name' => $faker->userName,
                'password' => Hash::make('1234'),
            ));
        }
    }
}
