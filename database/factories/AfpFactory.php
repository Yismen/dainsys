<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Afp::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
