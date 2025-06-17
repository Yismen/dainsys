<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Process;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
 */
class ProcessFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = Process::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence(2),
            'default' => false,
            'description' => fake()->paragraph(2),
        ];
    }
}
