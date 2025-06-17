<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Employee::class;
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'second_first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'second_last_name' => fake()->lastName(),
            'hire_date' => fake()->date(),
            'personal_id' => fake()->unique()->numberBetween(10000000000, 99999999999),
            'passport' => '',
            'date_of_birth' => fake()->date(),
            'cellphone_number' => fake()->unique()->numberBetween(8091000001, 8099999999),
            'secondary_phone' => fake()->email(),
            'position_id' => \App\Models\Position::factory(),
            'site_id' => \App\Models\Site::factory(),
            'project_id' => \App\Models\Project::factory(),
            'supervisor_id' => \App\Models\Supervisor::factory(),
            'gender_id' => \App\Models\Gender::factory(),
            'marital_id' => \App\Models\Marital::factory(),
            'ars_id' => \App\Models\Ars::factory(),
            'afp_id' => \App\Models\Afp::factory(),
            'nationality_id' => \App\Models\Nationality::factory(),
            'has_kids' => fake()->boolean(),
            'photo' => '',
        ];
    }
}
