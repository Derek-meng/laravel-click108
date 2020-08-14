<?php

use Illuminate\Database\Eloquent\Factory;
use Jubilee\Click108\Entries\TwelveConstellations;

$factory = app(Factory::class);
$factory->define(TwelveConstellations::class, function (\Faker\Generator $faker) {
    return [
        'name'            => $faker->name,
        'entire_score'    => $faker->numberBetween(1, 5),
        'entire_content'  => $faker->text,
        'love_score'      => $faker->numberBetween(1, 5),
        'love_content'    => $faker->text,
        'career_score'    => $faker->numberBetween(1, 5),
        'career_content'  => $faker->text,
        'fortune_score'   => $faker->numberBetween(1, 5),
        'fortune_content' => $faker->text,
        'day'             => $faker->date(),
    ];
});
