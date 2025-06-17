<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class DowntimeReasonFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\DowntimeReason::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
