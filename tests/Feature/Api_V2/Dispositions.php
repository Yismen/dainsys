<?php

namespace Tests\Feature\Api_V2;

use App\Models\RingCentral\Disposition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class Dispositions extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_dispositions_collection()
    {
        Disposition::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/dispositions');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'name',
                        'contacts',
                        'sales',
                        'upsales',
                        'cc_sales',
                    ],
                ],
            ]);
    }
}
