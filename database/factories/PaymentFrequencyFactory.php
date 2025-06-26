<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentFrequency>
 */
class PaymentFrequencyFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\PaymentFrequency::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
