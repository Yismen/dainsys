<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
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
