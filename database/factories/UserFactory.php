<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->word(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
        'is_active' => true,
        'is_admin' => false,
    ];
});
