<?php

namespace Tests\Feature\Api_V2;

use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\RingCentral\Disposition;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Dispositions extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_dispositions_collection()
    {
        factory(Disposition::class)->create();
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
