<?php

use Faker\Generator as Faker;

$factory->define(App\AttendanceCode::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'color' => '#FFFFFF',
        'absence' => true
    ];
});
