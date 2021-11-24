<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid(),
        'type' => App\Fake\Notification::class,
        'notifiable_type' => User::class,
        'notifiable_id' => factory(User::class),
        'data' => json_encode(['foo' => $faker->text()]),
        'read_at' => null,
    ];
});
