<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Campaign::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'project_id' => factory(App\Models\Project::class)->create()->id,
        'source_id' => factory(App\Models\Source::class)->create()->id,
        'revenue_type_id' => factory(App\Models\RevenueType::class)->create()->id,
        'sph_goal' => $faker->randomDigit(),
        'revenue_rate' => $faker->randomDigit(),
    ];
});
