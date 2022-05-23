<?php

use Faker\Generator as Faker;

$factory->define(App\Models\LoginName::class, function (Faker $faker) {
    return [
        'login' => $faker->paragraph(2),
        'employee_id' => factory(App\Models\Employee::class),
    ];
});
