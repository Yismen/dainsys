<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gender>
 */
class GenderFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Gender::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
