<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Campaign;
use App\Models\Employee;
use App\Models\Supervisor;
use App\Models\Performance;
use Illuminate\Support\Arr;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_collection_of_performances_data()
    {
        $performance = Performance::factory()->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/performance_data/last/2/months');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'unique_id',
                        'date',
                        'employee_id',
                        'first_name',
                        'second_first_name',
                        'last_name',
                        'second_last_name',
                        'employee_name',
                        'punch_id',
                        'hire_date',
                        'status',
                        'supervisor_employee',
                        'project_employee',
                        'client',
                        'department',
                        'site',
                        'salary',
                        'campaign',
                        'campaign_sph_goal',
                        'supervisor_performance',
                        'project_performance',
                        'source',
                        'login_time',
                        'production_time',
                        'talk_time',
                        'break_time',
                        'lunch_time',
                        'training_time',
                        'away_time',
                        'pending_dispo_time',
                        'off_hook_time',
                        'billable_hours',
                        'contacts',
                        'calls',
                        'sales',
                        'upsales',
                        'cc_sales',
                        'revenue',
                        'dontime_reason',
                        'reported_by',
                    ],
                ],
            ]);
    }

    /** @test */
    public function data_can_be_filtered_by_amount_of_months()
    {
        $this_month_performance = Performance::factory()->create(['date' => now()]);
        $last_month_performance = Performance::factory()->create(['date' => now()->subMonths(3)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/performance_data/last/1/months');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(Arr::only($this_month_performance->toArray(), ['unique_id', 'employee_name']));
        $response->assertJsonMissing(Arr::only($last_month_performance->toArray(), ['unique_id', 'employee_name']));
    }

    /** @test */
    public function data_can_be_filtered_by_campaign()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?campaign={$campaign->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['campaign' => $campaign->name])
            ->assertJsonMissing(['campaign' => $another_campaign->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id, 'name' => $employee->full_name]);
        Performance::factory()->create(['employee_id' => $another_employee->id, 'name' => $another_employee->full_name]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?employee={$employee->full_name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['employee_name' => $employee->full_name])
            ->assertJsonMissing(['employee_name' => $another_employee->full_name]);
    }

    /** @test */
    public function data_can_be_filtered_by_supervisor()
    {
        $supervisor = Supervisor::factory()->create();
        $another_supervisor = Supervisor::factory()->create();
        Performance::factory()->create(['supervisor_id' => $supervisor->id]);
        Performance::factory()->create(['supervisor_id' => $another_supervisor->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?supervisor={$supervisor->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['supervisor_performance' => $supervisor->name])
            ->assertJsonMissing(['supervisor_performance' => $another_supervisor->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_project_campaign()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?project_campaign={$campaign->project->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['project_performance' => $campaign->project->name])
            ->assertJsonMissing(['project_performance' => $another_campaign->project->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_site()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?site={$employee->site->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['site' => $employee->site->name])
            ->assertJsonMissing(['site' => $another_employee->site->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_source()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?source={$campaign->source->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['source' => $campaign->source->name])
            ->assertJsonMissing(['source' => $another_campaign->source->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_client()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?client={$campaign->project->client->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['client' => $campaign->project->client->name])
            ->assertJsonMissing(['client' => $another_campaign->project->client->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_project_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?project_employee={$employee->project->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['project_employee' => $employee->project->name])
            ->assertJsonMissing(['project_employee' => $another_employee->project->name]);
    }

    /** @test */
    public function data_can_be_filtered_by_supervisor_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/performances/performance_data/last/1/months?supervisor_employee={$employee->supervisor->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['supervisor_employee' => $employee->supervisor->name])
            ->assertJsonMissing(['supervisor_employee' => $another_employee->supervisor->name]);
    }
}
