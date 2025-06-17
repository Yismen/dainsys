<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\Permission::class;
    public function definition()
    {
        return [
            'name' => fake()->slug,
            'guard_name' => 'web',
            'resource' => fake()->slug
        ];
    }
}
