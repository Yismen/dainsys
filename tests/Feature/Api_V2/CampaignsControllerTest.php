<?php

namespace Tests\Feature\Api_V2;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CampaignsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_campaigns_collection()
    {
        Campaign::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/campaigns');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'project_id',
                        'source_id',
                        'revenue_type_id',
                        'sph_goal',
                        'rate',
                    ],
                ],
            ]);
    }
}
