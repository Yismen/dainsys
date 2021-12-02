<?php

namespace Tests\Feature\Api;

use App\Downtime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DowntimesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtimes_collection()
    {
        $downtimes = factory(Downtime::class, 3)->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/downtimes');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'unique_id',
                        'date',
                        'employee_id',
                        'campaign',
                        'project_performance',
                        'employee_name',
                        'login_time',
                        'downtime_reason',
                        'reported_by',
                    ]
                ]
            ]);
    }

    /** @test */
    public function downtimes_collection_can_be_filtered_by_months()
    {
        $recent_downtimes = factory(Downtime::class, 3)->create(['date' => now()]);
        $old_downtimes = factory(Downtime::class, 3)->create(['date' => now()->subMonths(4)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/downtimes?months=2');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment(['date' => $recent_downtimes->first()->date->format('Y-m-d H:i:s')])
            ->assertJsonMissing(['date' => $old_downtimes->first()->date->format('Y-m-d H:i:s')]);
    }
}
