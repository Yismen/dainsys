<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Punch::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class),
        'punch' => $faker->numberBetween(10000, 99999)
    ];
});
