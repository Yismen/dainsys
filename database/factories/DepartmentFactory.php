<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class DepartmentFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Department::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
