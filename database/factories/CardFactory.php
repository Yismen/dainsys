<?php

use Faker\Generator as Faker;

$factory->define(App\Card::class, function (Faker $faker) {
    return [
        'card' => random_int(10000, 99999),
        'employee_id' => factory(App\Employee::class),
    ];
});
