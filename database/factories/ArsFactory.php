<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ars>
 */
class ArsFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Ars::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
