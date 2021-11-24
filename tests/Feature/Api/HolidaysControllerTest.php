<?php

namespace Tests\Feature\Api;

use App\Holiday;
use App\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class HolidaysControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_holidays_collection()
    {
        factory(Holiday::class, 3)->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->json('GET', '/api/holidays');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "date",
                        "name",
                        "description",
                    ]
                ]
            ]);
    }
}
