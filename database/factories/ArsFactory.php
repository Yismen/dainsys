<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Ars::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
