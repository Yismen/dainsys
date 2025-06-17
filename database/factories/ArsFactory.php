<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class ArsFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected  $model = \App\Models\Ars::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
