<?php

namespace Tests\Feature\Api\V2;

use App\Site;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SitesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_sites_collection()
    {
        factory(Site::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/sites');

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
