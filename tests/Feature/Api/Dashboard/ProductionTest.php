<?php

namespace Tests\Feature\Api\Dashboard;

use Tests\TestCase;
use App\Models\Performance;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_collection_of_monthly_stats()
    {
        Performance::factory(3)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/production/monthly_stats');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'revenue',
                    'login_time',
                    'rph',
                    'sales',
                    'production_time',
                    'sph',
                    'efficiency',
                    'efficiency_over_production',
                    'sph_goal',
                    'month',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_mtd_stats()
    {
        Performance::factory(3)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/dashboards/production/mtd_stats');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'revenue_mtd',
                'login_hours_mtd',
                'production_hours_mtd',
                'billable_hours_mtd',
            ]);
    }
}
