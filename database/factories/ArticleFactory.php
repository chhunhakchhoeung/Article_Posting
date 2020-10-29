<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$data = $factory->define(Article::class, function (Faker $faker) {
    $min = 1;
    $max = 4;
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        // 'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'content' => $faker->text($maxNbChars = 1000),
        'amount_viewer' => rand(100, 1000),
        'video_link' => 'https://www.youtube.com/embed/UaaoBac2TTE',
        'slug' => $faker->slug(),
        'category_id' => rand($min, $max),
        'user_id' => rand(1,2),
        'published_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'status' => '1'
    ];
});

