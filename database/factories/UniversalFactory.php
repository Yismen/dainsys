<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Universal::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class)->create()->id,
        'since' => $faker->date(),
    ];
});
