<?php

namespace Tests\Feature\Api\V2;

use Tests\TestCase;
use App\DowntimeReason;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DowntimeReasonsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtime_reasons_collection()
    {
        $downtime = factory(DowntimeReason::class)->create();
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
