<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Termination>
 */
class TerminationFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Termination::class;
    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'termination_date' => fake()->date(),
            'termination_type_id' => \App\Models\TerminationType::factory(),
            'termination_reason_id' => \App\Models\TerminationReason::factory(),
            'can_be_rehired' => fake()->randomElement([true, false]),
            'comments' => fake()->realText(),
        ];
    }
}
