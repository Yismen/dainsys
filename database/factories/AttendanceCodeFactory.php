<?php

use Faker\Generator as Faker;

$factory->define(App\Models\AttendanceCode::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'color' => '#FFFFFF',
        'absence' => true
    ];
});
