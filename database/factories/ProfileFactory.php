<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class ProfileFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Profile::class;
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create(),
            'gender' => 'male',
            'bio' => fake()->paragraph,
            'phone' => fake()->phoneNumber(),
            'education' => fake()->paragraph,
            'skills' => fake()->paragraph,
            'work' => fake()->sentence,
            'location' => fake()->sentence
        ];
    }
}
