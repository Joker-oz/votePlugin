<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Vote::class, function (Faker $faker) {
    $now = Carbon::now()->toDateTimeString();
    return [
        'title' => str_random(10),
        'object' => random_int(1, 2),
        'status' => random_int(0, 1),
        'qr_link' => 'null',
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
