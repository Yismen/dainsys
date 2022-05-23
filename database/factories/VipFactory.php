<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Vip::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Models\Employee::class)->create()->id,
        'since' => $faker->date(),
    ];
});
