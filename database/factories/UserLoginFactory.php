<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserLogin;
use Faker\Generator as Faker;

$factory->define(UserLogin::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'logged_in_at' => now(),
        'logged_out_at' => now(),
    ];
});
