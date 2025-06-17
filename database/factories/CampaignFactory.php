<?php

namespace Database\Factories;

use App\Models\RevenueType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    protected $model = \App\Models\Campaign::class;

    public function definition()
    {
        $revenueTypeIds = [];
        try {
            foreach (['Sales Or Production', 'Production Time', 'Talk Time', 'Login Time', 'Downtime'] as $name) {
                $revenueTypeIds[] = RevenueType::factory()->create(['name' => $name])->id;
            }
        } catch (\Throwable) {
            // throw $th;
        }

        return [
            'name' => fake()->name(),
            'project_id' => \App\Models\Project::factory()->create()->id,
            'source_id' => \App\Models\Source::factory()->create()->id,
            'revenue_type_id' => fake()->randomElement($revenueTypeIds),
            'sph_goal' => fake()->randomDigit(),
            'revenue_rate' => fake()->randomDigit(),
        ];
    }
}
