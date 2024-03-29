<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Performance::class, function (Faker $faker) {
    $date = Carbon::now();

    return [
        'unique_id' => "{$date->format('Y-m-d')}-{$faker->randomDigitNotZero()}-{$faker->randomDigitNotZero()}",
        'date' => now(),
        'employee_id' => factory(App\Models\Employee::class),
        'name' => $faker->name(),
        'campaign_id' => factory(App\Models\Campaign::class),
        'supervisor_id' => factory(App\Models\Supervisor::class),
        'sph_goal' => 10,
        'login_time' => 8,
        'production_time' => 7.5,
        'talk_time' => 7.25,
        'billable_hours' => 7,
        'contacts' => 1500,
        'calls' => 6537,
        'transactions' => 12,
        'upsales' => 0,
        'cc_sales' => 0,
        'revenue' => 150,
        'downtime_reason_id' => null,
        'reported_by' => null,
        'file_name' => "faker_file_{$date->format('Ymd_His')}.xlsx"
    ];
});
