<?php

namespace Tests\Feature\Api;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SitesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_sites_collection()
    {
        Site::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/sites');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }
}
