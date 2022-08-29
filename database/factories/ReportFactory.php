<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'key' => $faker->slug(3),
        'active' => true,
        'description' => $faker->sentence(3),
    ];
});
