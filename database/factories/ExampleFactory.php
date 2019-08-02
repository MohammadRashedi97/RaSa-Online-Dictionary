<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Example;
use Faker\Generator as Faker;

$factory->define(Example::class, function (Faker $faker) {
    return [
        'example' => $faker->text(100),
        'word_id' => rand(1,50),
        'user_id' => 1,
        'like_count' => rand(0,200),
        'dislike_count' => rand(0,200),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
