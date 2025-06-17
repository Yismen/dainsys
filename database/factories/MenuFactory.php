<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Menu::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'display_name' => fake()->name(),
            'description' => fake()->paragraph(),
            'icon' => 'fa fa-star',
        ];
    }
}
