<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Site::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
