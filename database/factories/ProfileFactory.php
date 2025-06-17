<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
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
            'location' => fake()->sentence,
        ];
    }
}
