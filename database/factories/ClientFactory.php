<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Client::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'contact_name' => fake()->name(),
            'main_phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'secondary_phone' => fake()->phoneNumber(),
            'account_number' => fake()->phoneNumber(),
        ];
    }
}
