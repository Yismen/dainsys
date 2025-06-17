<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentType>
 */
class PaymentTypeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\PaymentType::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
