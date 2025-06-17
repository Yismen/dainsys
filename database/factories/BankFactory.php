<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class BankFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Bank::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
