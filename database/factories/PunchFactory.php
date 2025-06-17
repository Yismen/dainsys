<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Punch>
 */
class PunchFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Punch::class;
    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'punch' => fake()->numberBetween(1000, 9999)
        ];
    }
}
