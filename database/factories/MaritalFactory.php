<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Marital::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
