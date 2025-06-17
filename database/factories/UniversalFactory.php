<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class UniversalFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Universal::class;
    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory()->create()->id,
            'since' => fake()->date(),
        ];
    }
}
