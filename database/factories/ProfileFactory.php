<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User::class)->create(),
        'gender' => 'male',
        'bio' => $faker->paragraph,
        'phone' => $faker->phoneNumber(),
        'education' => $faker->paragraph,
        'skills' => $faker->paragraph,
        'work' => $faker->sentence,
        'location' => $faker->sentence
    ];
});
