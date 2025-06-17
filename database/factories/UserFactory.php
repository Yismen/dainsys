<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\User::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail,
            'username' => fake()->word(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'is_admin' => false,
        ];
    }
}
