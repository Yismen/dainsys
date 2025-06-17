<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marital>
 */
class MaritalFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Marital::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
