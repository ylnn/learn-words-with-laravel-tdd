<?php

use Faker\Generator as Faker;
use App\Word;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'word' => $faker->sentence,
        'mean' => $faker->sentence,
    ];
});
