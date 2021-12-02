<?php

use Faker\Generator as Faker;

$factory->define(App\SocialSecurity::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class),
        'number' => random_int(1000000001, 9999999999),
    ];
});
