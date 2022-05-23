<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'guard_name' => 'web'
    ];
});
