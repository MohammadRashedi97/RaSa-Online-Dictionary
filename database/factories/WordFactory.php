<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return
    [
        [
            'word' => 'a',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'word' => 'b',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ];
});
