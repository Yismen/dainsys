<?php

use Faker\Generator as Faker;

$factory->define(App\Shift::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'slug' => $faker->slug(),
        'start_at' => $faker->time(),
        'end_at' => $faker->time(),
        'monday' => 7.5,
        'tuesday' => 7.5,
        'wednesday' => 7.5,
        'thursday' => 7.5,
        'friday' => 7.5,
        'saturday' => 7.5,
        'sunday' => 7.5,
    ];
});
