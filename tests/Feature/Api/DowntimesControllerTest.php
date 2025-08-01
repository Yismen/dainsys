<?php

namespace Tests\Feature\Api;

use App\Models\Downtime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DowntimesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtimes_collection()
    {
        $downtimes = Downtime::factory(3)->create(['date' => now()]);
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
                    ],
                ],
            ]);
    }

    /** @test */
    public function downtimes_collection_can_be_filtered_by_months()
    {
        $recent_downtimes = Downtime::factory(3)->create(['date' => now()]);
        $old_downtimes = Downtime::factory(3)->create(['date' => now()->subMonths(4)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/downtimes?months=2');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment(['date' => $recent_downtimes->first()->date->format('Y-m-d H:i:s')])
            ->assertJsonMissing(['date' => $old_downtimes->first()->date->format('Y-m-d H:i:s')]);
    }

    /** @test */
    public function downtimes_collection_can_be_filtered_5_months_if_not_specified()
    {
        $recent_downtimes = Downtime::factory(3)->create(['date' => now()]);
        $five_months_old_downtimes = Downtime::factory(3)->create(['date' => now()->subMonths(5)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/downtimes');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment(['date' => $recent_downtimes->first()->date->format('Y-m-d H:i:s')])
            ->assertJsonMissing(['date' => $five_months_old_downtimes->first()->date->format('Y-m-d H:i:s')]);
    }

    /** @test */
    public function downtimes_are_filtered_by_campaign()
    {
        $desired_campaign_downtime = Downtime::factory()->create(['date' => now()])->load('campaign');
        $another_campaign_downtime = Downtime::factory()->create(['date' => now()])->load('campaign');
        Passport::actingAs($this->user());
        $response = $this->get("/api/performances/downtimes?campaign={$desired_campaign_downtime->campaign->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['campaign' => $desired_campaign_downtime->campaign->name]);
        $response->assertJsonMissing(['campaign' => $another_campaign_downtime->campaign->name]);
    }
}
