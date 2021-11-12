<?php

use Faker\Generator as Faker;

$factory->define(App\Downtime::class, function (Faker $faker) {
    $employee = factory(App\Employee::class)->create();
    $campaign = factory(App\Campaign::class)->create();
    $downtime_reason = factory(App\DowntimeReason::class)->create();
    $supervisor = factory(App\Supervisor::class)->create();

    request()->merge([
        'employee_id' => $employee->id,
        'campaign_id' => $campaign->id,
        'downtime_reason_id' => $downtime_reason->id,
    ]);

    return [
        'date' => $faker->date(),
        'employee_id' => $employee->id,
        'campaign_id' => $campaign->id,
        'downtime_reason_id' => $downtime_reason->id,
        'login_time' => 8,
        'reported_by' => $supervisor->name
    ];
});
