<?php

use Faker\Generator as Faker;

$factory->define(App\Downtime::class, function (Faker $faker) {
    // To create a downtime it is required the request has employee_id
    $employee = factory(App\Employee::class)->create();
    request()->merge([
        'employee_id' => $employee->id
    ]);

    return [
        'date' => $faker->date(),
        'employee_id' => $employee->id,
        'campaign_id' => factory(App\Campaign::class)->create(['name' => $faker->company() . '-downtimes']),
        'downtime_reason_id' => factory(App\DowntimeReason::class),
        'reported_by' => factory(App\Supervisor::class)->create(['active' => 1])->name,
        'login_time' => 8,
    ];
});
