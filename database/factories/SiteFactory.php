<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Site::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
