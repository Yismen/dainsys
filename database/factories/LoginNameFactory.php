<?php

use Faker\Generator as Faker;

$factory->define(App\LoginName::class, function (Faker $faker) {
    return [
        'login' => $faker->paragraph(2),
        'employee_id' => factory(App\Employee::class),
    ];
});
