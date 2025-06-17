<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class ShiftFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Shift::class;
    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'slug' => fake()->slug(),
            'start_at' => fake()->time(),
            'end_at' => fake()->time(),
            'monday' => 7.5,
            'tuesday' => 7.5,
            'wednesday' => 7.5,
            'thursday' => 7.5,
            'friday' => 7.5,
            'saturday' => 7.5,
            'sunday' => 7.5,
        ];
    }
}
