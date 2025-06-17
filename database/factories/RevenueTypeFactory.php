<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class RevenueTypeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\RevenueType::class;
    public function definition()
    {
        return [
            'name' => fake()->name,
        ];
    }
}
