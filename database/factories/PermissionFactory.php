<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->slug,
        'guard_name' => 'web',
        'resource' => $faker->slug
    ];
});
