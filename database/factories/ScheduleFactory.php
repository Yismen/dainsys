<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'slug' => $faker->slug(),
        'date' => $faker->date(),
        'hours' => random_int(5, 12),
    ];
});
