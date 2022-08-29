<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipient;
use Faker\Generator as Faker;

$factory->define(Recipient::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'title' => $faker->title(),
    ];
});
