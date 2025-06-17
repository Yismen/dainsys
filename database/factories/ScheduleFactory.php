<?php

namespace Database\Factories;

use Faker\Generator as Faker;

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
