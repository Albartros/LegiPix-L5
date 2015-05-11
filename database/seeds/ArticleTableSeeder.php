<?php

use App\Article;
use App\ArticleCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder {

    public function run()
    {
        // Create a Faker object
        $faker = Faker::create();

        // Create a fake category
        $category_name = $faker->catchPhrase;

        ArticleCategory::create(array(
            'name' => $category_name,
            'position' => 1,
            'slug' => $faker->slug,
            'text' => $faker->sentence(6),
        ));

        // Create 5 fake featured articles
        foreach (range(1, 5) as $item)
        {
            $article_name = $faker->sentence(4);

            Article::create(array(
                'category_id' => 1,
                'featured' => 1,
                'name' => $article_name,
                'slug' => $faker->slug,
                'text' => $faker->text(500),
                'user_id' => 1,
            ));
        }

        // Create 6 fake non-featured articles
        foreach (range(1, 6) as $item)
        {
            $article_name = $faker->sentence(4);

            Article::create(array(
                'category_id' => 1,
                'name' => $article_name,
                'slug' => $faker->slug,
                'text' => $faker->text(500),
                'user_id' => 1,
            ));
        }
    }
}
