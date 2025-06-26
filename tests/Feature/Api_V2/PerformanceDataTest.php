<?php

namespace Tests\Feature\Api_V2;

use App\Models\Campaign;
use App\Models\Employee;
use App\Models\Performance;
use App\Models\Supervisor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PerformanceDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_collection_of_performances_data()
    {
        $performance = Performance::factory()->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/performances');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
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
    public function if_months_is_not_specified_it_just_returns_the_last_two_months()
    {
        $this_month_performance = Performance::factory()->create(['date' => now()]);
        $last_month_performance = Performance::factory()->create(['date' => now()->subMonths(4)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/performances');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(Arr::only($this_month_performance->toArray(), ['unique_id', 'employee_name']))
            ->assertJsonMissing(Arr::only($last_month_performance->toArray(), ['unique_id', 'employee_name']));
    }

    /** @test */
    public function performance_data_can_be_filtered_by_amount_of_months()
    {
        $this_month_performance = Performance::factory()->create(['date' => now()]);
        $last_month_performance = Performance::factory()->create(['date' => now()->subMonths(2)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/performances?months=1');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(Arr::only($this_month_performance->toArray(), ['unique_id', 'employee_name']))
            ->assertJsonMissing(Arr::only($last_month_performance->toArray(), ['unique_id', 'employee_name']));
    }

    /** @test */
    public function performance_data_can_be_filtered_by_campaign()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?campaign={$campaign->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['campaign' => $campaign->name])
            ->assertJsonMissing(['campaign' => $another_campaign->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id, 'name' => $employee->full_name]);
        Performance::factory()->create(['employee_id' => $another_employee->id, 'name' => $another_employee->full_name]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?employee={$employee->full_name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['employee_name' => $employee->full_name])
            ->assertJsonMissing(['employee_name' => $another_employee->full_name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_supervisor()
    {
        $supervisor = Supervisor::factory()->create();
        $another_supervisor = Supervisor::factory()->create();
        Performance::factory()->create(['supervisor_id' => $supervisor->id]);
        Performance::factory()->create(['supervisor_id' => $another_supervisor->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?supervisor={$supervisor->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['supervisor_performance' => $supervisor->name])
            ->assertJsonMissing(['supervisor_performance' => $another_supervisor->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_project_campaign()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?project_campaign={$campaign->project->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['project_performance' => $campaign->project->name])
            ->assertJsonMissing(['project_performance' => $another_campaign->project->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_site()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?site={$employee->site->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['site' => $employee->site->name])
            ->assertJsonMissing(['site' => $another_employee->site->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_source()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?source={$campaign->source->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['source' => $campaign->source->name])
            ->assertJsonMissing(['source' => $another_campaign->source->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_client()
    {
        $campaign = Campaign::factory()->create();
        $another_campaign = Campaign::factory()->create();
        Performance::factory()->create(['campaign_id' => $campaign->id]);
        Performance::factory()->create(['campaign_id' => $another_campaign->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?client={$campaign->project->client->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['client' => $campaign->project->client->name])
            ->assertJsonMissing(['client' => $another_campaign->project->client->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_project_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?project_employee={$employee->project->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['project_employee' => $employee->project->name])
            ->assertJsonMissing(['project_employee' => $another_employee->project->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_supervisor_employee()
    {
        $employee = Employee::factory()->create();
        $another_employee = Employee::factory()->create();
        Performance::factory()->create(['employee_id' => $employee->id]);
        Performance::factory()->create(['employee_id' => $another_employee->id]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?supervisor_employee={$employee->supervisor->name}");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['supervisor_employee' => $employee->supervisor->name])
            ->assertJsonMissing(['supervisor_employee' => $another_employee->supervisor->name]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_date()
    {
        $today = Performance::factory()->create(['date' => now()]);
        $not_today = Performance::factory()->create(['date' => now()->subDay()]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?date={$today->date}");

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['date' => $today->date->format('Y-m-d H:i:s')]);
        $response->assertJsonMissing(['date' => $not_today->date->format('Y-m-d H:i:s')]);
    }

    /** @test */
    public function performance_data_can_be_filtered_by_dates_between()
    {
        $from_date = Performance::factory()->create(['date' => now()->subDays(5)]);
        $to_date = Performance::factory()->create(['date' => now()->subDay()]);
        $today = Performance::factory()->create(['date' => now()]);
        Passport::actingAs($this->user());

        $response = $this->get("/api/v2/performances?dates_between={$from_date->date},{$to_date->date}");

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $response->assertJsonFragment(['id' => $from_date->id]);
        $response->assertJsonFragment(['id' => $to_date->id]);
        $response->assertJsonMissing(['id' => $today->id]);
    }
}
