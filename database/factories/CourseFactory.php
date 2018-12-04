<?php

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => mt_rand(1,2),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
