<?php

namespace Tests\Feature\Api_V2;

use App\Models\DowntimeReason;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DowntimeReasonsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtime_reasons_collection()
    {
        $downtime = DowntimeReason::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/downtime_reasons');

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
