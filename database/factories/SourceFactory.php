<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class SourceFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Source::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
