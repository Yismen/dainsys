<?php

namespace Database\Factories;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Contact::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'works_at' => fake()->company,
            'position' => fake()->jobTitle,
            'secondary_phone' => fake()->phoneNumber(),
            'email' => fake()->email,
        ];
    }
}
