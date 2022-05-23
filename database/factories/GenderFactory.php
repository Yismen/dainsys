<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gender::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
