<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nationality>
 */
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
