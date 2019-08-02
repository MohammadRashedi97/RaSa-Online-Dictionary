<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\EnglishDefinition;
use Faker\Generator as Faker;

$factory->define(EnglishDefinition::class, function (Faker $faker) {
    return [
        'englishDefinition' => $faker->text(100),
        'word_id' => rand(1,50),
        'user_id' => 1,
        'like_count' => rand(0,200),
        'dislike_count' => rand(0,200),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
