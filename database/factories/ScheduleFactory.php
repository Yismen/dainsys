<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Schedule::class;

    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'slug' => fake()->slug(),
            'date' => fake()->date(),
            'hours' => random_int(5, 12),
        ];
    }
}
