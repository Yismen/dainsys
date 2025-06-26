<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoginName>
 */
class LoginNameFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\LoginName::class;

    public function definition()
    {
        return [
            'login' => fake()->paragraph(2),
            'employee_id' => \App\Models\Employee::factory(),
        ];
    }
}
