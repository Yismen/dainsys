<?php

namespace Database\Factories;

use App\Models\Client;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Project::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'client_id' => Client::factory(),
        ];
    }
}
