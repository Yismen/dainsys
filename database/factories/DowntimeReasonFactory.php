<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DowntimeReason::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
