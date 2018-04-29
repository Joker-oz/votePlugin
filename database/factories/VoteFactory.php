<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Vote::class, function (Faker $faker) {
    $beginTime = Carbon::now()->toDateTimeString();
    $endTime = Carbon::now()->addMinutes(random_int(0, 10))->toDateTimeString();
    return [
        'title' => str_random(10),
        'object' => random_int(1, 2),
        'status' => random_int(0, 1),
        'body' => $faker->paragraph(2),
        'qr_link' => 'null',
        'created_at' => $beginTime,
        'updated_at' => $endTime,
    ];
});
