<?php

namespace Tests\Feature\Api;

use App\DowntimeReason;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DowntimeReasonsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtime_reasons_collection()
    {
        $downtime = factory(DowntimeReason::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/downtime_reasons');

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
