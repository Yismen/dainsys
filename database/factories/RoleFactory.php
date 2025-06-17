<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class RoleFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Role::class;
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'guard_name' => 'web'
        ];
    }
}
