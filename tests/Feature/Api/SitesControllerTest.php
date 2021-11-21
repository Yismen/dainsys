<?php

namespace Tests\Feature\Api;

use App\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SitesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_sites_collection()
    {
        factory(Site::class)->create();
        Passport::actingAs($this->user());

        $response = $this->json('GET', '/api/performances/sites');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ]
                ]
            ]);
    }
}
