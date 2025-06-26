<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supervisor>
 */
class SupervisorFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Supervisor::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'active' => 1,
        ];
    }
}
