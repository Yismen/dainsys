<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Report;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected
$model = Report::class;
    public function definition()
    {
        return [
            'name' => fake()->sentence(3),
            'key' => fake()->slug(3),
            'active' => true,
            'description' => fake()->sentence(3),
        ];
    }
}
