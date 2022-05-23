<?php

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'client_id' => factory(Client::class),
    ];
});
