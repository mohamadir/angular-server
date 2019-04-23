<?php

use App\Comment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'user_id' =>  $faker->biasedNumberBetween($min = 1, $max = 10),
        'blog_id' =>  $faker->biasedNumberBetween($min = 1, $max = 30)

    ];
});
