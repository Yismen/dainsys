<?php

namespace Database\Factories;

use Faker\Generator as Faker;

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
