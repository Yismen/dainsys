<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Bank::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
