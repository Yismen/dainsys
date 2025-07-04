<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Role::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'guard_name' => 'web',
        ];
    }
}
