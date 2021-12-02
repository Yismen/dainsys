<?php

use App\Employee;
use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'employee_id' => factory(Employee::class),
        'sector' => $faker->sentence(2),
        'street_address' => $faker->address(),
        'city' => $faker->city()
    ];
});
