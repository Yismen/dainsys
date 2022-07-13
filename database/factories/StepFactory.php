<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Step;
use App\Models\Process;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->paragraph(2),
        'process_id' => factory(Process::class),
        'order' => $faker->numberBetween(1, 50),
    ];
});
