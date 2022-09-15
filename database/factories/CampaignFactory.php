<?php

use App\Models\RevenueType;
use Faker\Generator as Faker;

$factory->define(App\Models\Campaign::class, function (Faker $faker) {
    $revenueTypeIds = [];
    try {
        foreach (['Sales Or Production', 'Production Time', 'Talk Time', 'Login Time', 'Downtime'] as $name) {
            $revenueTypeIds[] = factory(RevenueType::class)->create(['name' => $name])->id;
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return [
        'name' => $faker->name(),
        'project_id' => factory(App\Models\Project::class)->create()->id,
        'source_id' => factory(App\Models\Source::class)->create()->id,
        'revenue_type_id' => $faker->randomElement($revenueTypeIds),
        'sph_goal' => $faker->randomDigit(),
        'revenue_rate' => $faker->randomDigit(),
    ];
});
