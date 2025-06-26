<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialSecurity>
 */
class SocialSecurityFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\SocialSecurity::class;

    public function definition()
    {
        return [
            'employee_id' => \App\Models\Employee::factory(),
            'number' => random_int(1000000001, 9999999999),
        ];
    }
}
