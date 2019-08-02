<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'word' => $faker->word,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
