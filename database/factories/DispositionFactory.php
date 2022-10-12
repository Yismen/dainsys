<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RingCentral\Disposition::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'contacts' => 1,
        'sales' => 1,
        'upsales' => 1,
        'cc_sales' => 1,
    ];
});
