<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class CardFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Card::class;
    public function definition()
    {
        return [
            'card' => random_int(10000000, 99999999),
            'employee_id' => \App\Models\Employee::factory(),
        ];
    }
}
