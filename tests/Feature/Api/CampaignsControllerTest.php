<?php

namespace Tests\Feature\Api;

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
        factory(Campaign::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/campaigns');

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
