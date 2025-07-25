<?php

namespace Tests\Feature\Api_V2;

use App\Models\OvernightHour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class OvernightHoursControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_overnight_hours_collection()
    {
        OvernightHour::factory(5)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/overnight_hours');

        $response->assertJsonCount(5, 'data');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'date',
                        'employee_id',
                        'name',
                        'hours',
                    ],
                ],
            ]);
    }
}
