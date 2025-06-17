<?php

namespace Database\Factories;

use Faker\Generator as Faker;

class AttendanceCodeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected  $model = \App\Models\AttendanceCode::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence(3),
            'color' => '#FFFFFF',
            'absence' => true
        ];
    }
}
