<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Position::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'department_id' => factory(App\Models\Department::class)->create()->id,
        'payment_type_id' => factory(App\Models\PaymentType::class)->create()->id,
        'payment_frequency_id' => factory(App\Models\PaymentFrequency::class)->create()->id,
        'salary' => 125,
    ];
});
