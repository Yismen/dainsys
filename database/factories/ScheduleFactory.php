<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Schedule::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class),
        'slug' => $faker->slug(),
        'date' => $faker->date(),
        'hours' => random_int(5, 12),
    ];
});
