<?php

use App\Client;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'display_name' => $faker->name(),
        'description' => $faker->paragraph(),
        'icon' => 'fa fa-star'
    ];
});
