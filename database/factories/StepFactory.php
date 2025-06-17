<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Step;
use App\Models\Process;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected
$model = Step::class;
    public function definition()
    {
        return [
            'name' => fake()->sentence(2),
            'description' => fake()->paragraph(2),
            'process_id' => Process::factory(),
            'order' => fake()->numberBetween(1, 50),
        ];
    }
}
