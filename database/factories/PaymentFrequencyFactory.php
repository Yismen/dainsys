<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PaymentFrequency::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
