<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipient;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipient>
 */
class RecipientFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected
$model = Recipient::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'title' => fake()->title(),
        ];
    }
}
