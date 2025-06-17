<?php

namespace Database\Factories;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RingCentral\Disposition>
 */
class DispositionFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{

    protected $model = \App\Models\RingCentral\Disposition::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'contacts' => 1,
            'sales' => 1,
            'upsales' => 1,
            'cc_sales' => 1,
        ];
    }
}
