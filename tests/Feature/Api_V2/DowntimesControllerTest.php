<?php

namespace Tests\Feature\Api_V2;

use App\Models\Downtime;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DowntimesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_downtimes_collection()
    {
        $downtimes = factory(Downtime::class, 3)->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/downtimes');

        $response->assertOk();

        $response->assertJsonCount(3, 'data');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'unique_id',
                    'date',
                    'employee_id',
                    'campaign',
                    'project_campaign',
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
        $recent_downtimes = factory(Downtime::class, 3)->create(['date' => now()]);
        $old_downtimes = factory(Downtime::class, 3)->create(['date' => now()->subMonths(4)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/downtimes?months=2');

        $response->assertOk();
        $response->assertJsonCount(3, 'data');
        $response->assertJsonFragment(['date' => $recent_downtimes->first()->date->format('Y-m-d H:i:s')]);
        $response->assertJsonMissing(['date' => $old_downtimes->first()->date->format('Y-m-d H:i:s')]);
    }

    /** @test */
    public function downtimes_collection_can_be_filtered_5_months_if_not_specified()
    {
        $recent_downtimes = factory(Downtime::class, 3)->create(['date' => now()]);
        $five_months_old_downtimes = factory(Downtime::class, 3)->create(['date' => now()->subMonths(5)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/downtimes');

        $response->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment(['date' => $recent_downtimes->first()->date->format('Y-m-d H:i:s')])
            ->assertJsonMissing(['date' => $five_months_old_downtimes->first()->date->format('Y-m-d H:i:s')]);
    }

    /** @test */
    public function downtimes_are_filtered_by_campaign()
    {
        $desired_campaign_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign');
        $another_campaign_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign');
        Passport::actingAs($this->user());
        $response = $this->get("/api/v2/downtimes?campaign={$desired_campaign_downtime->campaign->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['campaign' => $desired_campaign_downtime->campaign->name]);
        $response->assertJsonMissing(['campaign' => $another_campaign_downtime->campaign->name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_client()
    {
        Passport::actingAs($this->user());
        $desired_client_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.project.client');
        $another_client_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.project.client');

        $response = $this->get("/api/v2/downtimes?client={$desired_client_downtime->campaign->project->client->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['campaign' => $desired_client_downtime->campaign->name]);
        $response->assertJsonMissing(['campaign' => $another_client_downtime->campaign->name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_employee()
    {
        Passport::actingAs($this->user());
        $desired_employee_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee');
        $another_employee_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee');

        $response = $this->get("/api/v2/downtimes?employee={$desired_employee_downtime->employee->full_name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['employee_name' => $desired_employee_downtime->employee->full_name]);
        $response->assertJsonMissing(['employee_name' => $another_employee_downtime->employee->full_name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_site()
    {
        Passport::actingAs($this->user());
        $desired_site_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee.site');
        $another_site_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee.site');

        $response = $this->get("/api/v2/downtimes?site={$desired_site_downtime->employee->site->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['employee_name' => $desired_site_downtime->employee->full_name]);
        $response->assertJsonMissing(['employee_name' => $another_site_downtime->employee->full_name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_source()
    {
        Passport::actingAs($this->user());
        $desired_source_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.source');
        $another_source_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.source');

        $response = $this->get("/api/v2/downtimes?source={$desired_source_downtime->campaign->source->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['campaign' => $desired_source_downtime->campaign->name]);
        $response->assertJsonMissing(['campaign' => $another_source_downtime->campaign->name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_supervisor()
    {
        Passport::actingAs($this->user());
        $desired_supervisor_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee');
        $another_supervisor_downtime = factory(Downtime::class)->create(['date' => now()])->load('employee');

        $response = $this->get("/api/v2/downtimes?supervisor={$desired_supervisor_downtime->supervisor->name}");

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['employee_name' => $desired_supervisor_downtime->employee->full_name]);
        $response->assertJsonMissing(['employee_name' => $another_supervisor_downtime->employee->full_name]);
    }

    /** @test */
    public function downtimes_are_filtered_by_project_campaign()
    {
        Passport::actingAs($this->user());
        $desired_project_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.project');
        $another_project_downtime = factory(Downtime::class)->create(['date' => now()])->load('campaign.project');

        $response = $this->get("/api/v2/downtimes?project_campaign={$desired_project_downtime->campaign->project->name}");

        $response->assertOk();
        $response->assertJsonFragment(['project_campaign' => $desired_project_downtime->campaign->project->name]);
        $response->assertJsonMissing(['project_campaign' => $another_project_downtime->campaign->project->name]);
        $response->assertJsonCount(1, 'data');
    }
}
