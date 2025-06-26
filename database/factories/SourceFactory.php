<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Source>
 */
class SourceFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Source::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
