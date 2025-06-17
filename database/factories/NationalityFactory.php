<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class NationalityFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Nationality::class;
    public function definition()
    {
        return [
            'name' => fake()->unique()->country() . '_' . fake()->randomNumber(),
        ];
    }
}
