<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TerminationReason>
 */
class TerminationReasonFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\TerminationReason::class;
    public function definition()
    {
        return [
            'reason' => fake()->sentence,
            'description' => fake()->sentence,
        ];
    }
}
