<?php

namespace Database\Factories;

use App\Models\Employee;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddressFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    use HasFactory;

    protected $model = \App\Models\Address::class;
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'sector' => fake()->sentence(2),
            'street_address' => fake()->address(),
            'city' => fake()->city()
        ];
    }
}
