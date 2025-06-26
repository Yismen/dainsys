<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Downtime>
 */
class DowntimeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Downtime::class;

    public function definition()
    {
        // To create a downtime it is required the request has employee_id
        $employee = \App\Models\Employee::factory()->create();
        request()->merge([
            'employee_id' => $employee->id,
        ]);

        return [
            'date' => fake()->date(),
            'employee_id' => $employee->id,
            'campaign_id' => \App\Models\Campaign::factory()->create(['name' => fake()->company().'-downtimes']),
            'downtime_reason_id' => \App\Models\DowntimeReason::factory(),
            'reported_by' => \App\Models\Supervisor::factory()->create(['active' => 1])->name,
            'login_time' => 8,
        ];
    }
}
