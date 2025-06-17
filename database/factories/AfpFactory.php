<?php

namespace Database\Factories;

class AfpFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected  $model = \App\Models\Afp::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
