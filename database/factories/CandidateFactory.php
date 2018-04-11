<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Candidate::class, function (Faker $faker) {
    return [
        'v_id' => random_int(1, 2),
        'c_id' => random_int(1, 999),
        'c_name' => $faker->name,
        'c_score' => random_int(1, 999),
        'c_img' => str_random(10),
    ];
});
