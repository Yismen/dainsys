<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
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
            'city' => fake()->city(),
        ];
    }
}
