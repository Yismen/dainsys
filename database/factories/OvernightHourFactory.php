<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OvernightHour::class, function (Faker $faker) {
    $employee = factory('App\Models\Employee')->create();
    return [
        'date' => $faker->date,
        'employee_id' => $employee->id,
        'hours' => $faker->numberBetween(3, 12),
        'unique_id' => join('-', [$faker->numberBetween(1, 1200), $employee->id, $faker->numberBetween(1, 1200)])
    ];
});
