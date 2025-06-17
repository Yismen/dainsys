<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Position::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'department_id' => \App\Models\Department::factory()->create()->id,
            'payment_type_id' => \App\Models\PaymentType::factory()->create()->id,
            'payment_frequency_id' => \App\Models\PaymentFrequency::factory()->create()->id,
            'salary' => 125,
        ];
    }
}
