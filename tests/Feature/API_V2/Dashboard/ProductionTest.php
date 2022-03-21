<?php

namespace Tests\Feature\Api_V2\Dashboard;

use Tests\TestCase;
use App\Performance;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_collection_of_monthly_stats()
    {
        factory(Performance::class, 3)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/dashboards/production/monthly_stats');

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
                    'sph_goal',
                    'month',
                ],
            ]);
    }

    /** @test */
    public function it_returns_a_collection_of_mtd_stats()
    {
        factory(Performance::class, 3)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/dashboards/production/mtd_stats');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'revenue_mtd',
                'login_hours_mtd',
                'production_hours_mtd',
            ]);
    }
}
