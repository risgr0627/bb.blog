<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->word,
        'body' => $faker->realText,
        'height' => $faker->numberBetween(140,200),
        'weight' => $faker->numberBetween(30,100),
        'team' => $faker->word,
        'position' => $faker->word
    ];
});
