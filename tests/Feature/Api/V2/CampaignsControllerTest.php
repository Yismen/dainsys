<?php

namespace Tests\Feature\Api\V2;

use App\Campaign;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampaignsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_campaigns_collection()
    {
        factory(Campaign::class)->create();
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
