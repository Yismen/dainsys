<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class HolidayFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Holiday::class;
    public function definition()
    {
        return [
            'date' => fake()->date,
            'name' => fake()->text(50),
            'description' => fake()->text(80)
        ];
    }
}
