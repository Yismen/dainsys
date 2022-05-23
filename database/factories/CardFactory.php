<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Card::class, function (Faker $faker) {
    return [
        'card' => random_int(10000000, 99999999),
        'employee_id' => factory(App\Models\Employee::class),
    ];
});
