<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Process;
use Faker\Generator as Faker;

$factory->define(Process::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->paragraph(2),
    ];
});
