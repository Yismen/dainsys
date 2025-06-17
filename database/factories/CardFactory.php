<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
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
