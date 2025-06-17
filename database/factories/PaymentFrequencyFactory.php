<?php

namespace Database\Factories;

use Faker\Generator as Faker;

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
