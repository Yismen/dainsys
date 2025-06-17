<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OvernightHour>
 */
class OvernightHourFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\OvernightHour::class;
    public function definition()
    {
        $employee = \App\Models\Employee::factory()->create();
        return [
            'date' => fake()->date,
            'employee_id' => $employee->id,
            'hours' => fake()->numberBetween(3, 12),
            'unique_id' => implode('-', [fake()->numberBetween(1, 1200), $employee->id, fake()->numberBetween(1, 1200)])
        ];
    }
}
