<?php

use App\Forum;
use App\ForumCategory;
use App\Topic;
use App\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ForumTablesSeeder extends Seeder {

    public function run()
    {
        // Create a Faker object
        $faker = Faker::create();

        // Create fake category
        ForumCategory::create(array(
            'name' => $faker->catchPhrase,
            'position' => 1,
            'text' => $faker->sentence(6),
        ));

        // Create 5 fake forums
        foreach (range(1, 5) as $item)
        {
            Forum::create(array(
                'category_id' => 1,
                'name' => $faker->sentence(4),
                'position' => $item,
                'slug' => $faker->slug,
                'text' => $faker->sentence(6),
            ));
        }

        // Create 100 fake topics
        foreach (range(1, 100) as $item)
        {
            Topic::create(array(
                'anwsered_at' => $faker->dateTimeBetween('now', '+5 minutes'),
                'forum_id' => $faker->numberBetween(1, 5),
                'last_post_id' => 1,
                'locked' => $faker->numberBetween(0, 1),
                'name' => $faker->sentence(4),
                'pinned' => $faker->numberBetween(0, 1),
                'slug' => $faker->slug,
                'user_id' => 1,
            ));
        }

        // Create 500 fake posts
        foreach (range(1, 500) as $item)
        {
            Post::create(array(
                'topic_id' => $faker->numberBetween(1, 100),
                'text' => $faker->text(500),
                'user_id' => $faker->numberBetween(1, 6),
            ));
        }
    }
}
