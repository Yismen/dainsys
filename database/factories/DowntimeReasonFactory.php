<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DowntimeReason>
 */
class DowntimeReasonFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\DowntimeReason::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
