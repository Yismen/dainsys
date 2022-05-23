<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RevenueType::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
