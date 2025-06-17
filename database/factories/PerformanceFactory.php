<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Performance::class;
    public function definition()
    {
        $date = Carbon::now();
        return [
            'unique_id' => implode('-', [
                "{$date->format('Y-m-d')}-fake()->randomDigitNotZero()}",
                fake()->unique()->randomDigitNotZero(),
                fake()->unique()->randomDigitNotZero()
            ]),

            'date' => now(),
            'employee_id' => \App\Models\Employee::factory(),
            'name' => fake()->name(),
            'campaign_id' => \App\Models\Campaign::factory(),
            'supervisor_id' => \App\Models\Supervisor::factory(),
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
    }
}
