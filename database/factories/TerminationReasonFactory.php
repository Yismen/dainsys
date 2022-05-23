<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TerminationReason::class, function (Faker $faker) {
    return [
        'reason' => $faker->sentence,
        'description' => $faker->sentence,
    ];
});
