<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TerminationType>
 */
class TerminationTypeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\TerminationType::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'description' => fake()->sentence,
        ];
    }
}
