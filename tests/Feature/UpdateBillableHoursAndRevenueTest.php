<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Campaign;
use App\Models\Performance;
use App\Models\RevenueType;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\UpdateBillableHoursAndRevenue;
use App\Jobs\UpdateBillableHoursAndRevenue as JobsUpdateBillableHoursAndRevenue;

class UpdateBillableHoursAndRevenueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function billable_hours_and_revenue_job_is_queued()
    {
        Queue::fake();

        $this->artisan(UpdateBillableHoursAndRevenue::class);

        Queue::assertPushed(JobsUpdateBillableHoursAndRevenue::class);
    }

    /** @test */
    public function billable_hours_and_revenue_is_updated_to_production_time_when_revenue_type_is_sales_or_production()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Sales Or Production']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
        
        $this->artisan(UpdateBillableHoursAndRevenue::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->production_time,
            'revenue' => $performance->transactions * $performance->campaign->revenue_rate,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_is_updated_to_production_time_when_revenue_type_is_production_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Production Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->production_time,
            'revenue' => $performance->production_time * $campaign->revenue_rate,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_is_updated_to_talk_time_when_revenue_type_is_talk_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Talk Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->talk_time,
            'revenue' => $performance->talk_time * $campaign->revenue_rate,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_is_updated_to_login_time_when_revenue_type_is_login_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->login_time,
            'revenue' => $performance->login_time * $campaign->revenue_rate,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_only_update_specified_revenue_type()
    {
        Performance::unsetEventDispatcher();
        $revenue_type_login_time = factory(RevenueType::class)->create(['name' => 'Login Time']);
        $revenue_type_talk_time = factory(RevenueType::class)->create(['name' => 'Talk Time']);
        $campaign_login_time = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type_login_time->id]);
        $campaign_talk_time = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type_talk_time->id]);
        $performance_1 = factory(Performance::class)->create([
            'campaign_id' => $campaign_login_time->id,
            'login_time' => 10,
            'production_time' => 10,
            'login_time' => 10,
            'talk_time' => 4,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
        $performance_2 = factory(Performance::class)->create([
            'campaign_id' => $campaign_talk_time->id,
            'login_time' => 10,
            'production_time' => 10,
            'login_time' => 10,
            'talk_time' => 4,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class, [
            '--revenue_type' => $revenue_type_login_time->name
        ]);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_1->id,
            'campaign_id' => $campaign_login_time->id,
            'billable_hours' => 10,
            'revenue' => $campaign_login_time->revenue_rate * $performance_1->login_time,
        ]);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_2->id,
            'campaign_id' => $campaign_talk_time->id,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_only_update_records_for_after_certain_amount_of_days()
    {
        Performance::unsetEventDispatcher();
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance_recent = factory(Performance::class)->create([
            'date' => now(),
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
        $performance_old = factory(Performance::class)->create([
            'date' => now()->subMonths(2),
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class, [
            '--days' => 4
        ]);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_recent->id,
            'campaign_id' => $campaign->id,
            'billable_hours' => 10,
            'revenue' => 10 * $campaign->revenue_rate,
        ]);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_old->id,
            'campaign_id' => $campaign->id,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_and_revenue_only_update_last_day_if_days_is_not_specified()
    {
        Performance::unsetEventDispatcher();
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance_recent = factory(Performance::class)->create([
            'date' => now(),
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
        $performance_old = factory(Performance::class)->create([
            'date' => now()->subDays(2),
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);

        $this->artisan(UpdateBillableHoursAndRevenue::class);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_recent->id,
            'campaign_id' => $campaign->id,
            'billable_hours' => 10,
            'revenue' => 10 * $campaign->revenue_rate,
        ]);

        $this->assertDatabaseHas('performances', [
            'id' => $performance_old->id,
            'campaign_id' => $campaign->id,
            'billable_hours' => 4,
            'revenue' => 4,
        ]);
    }
}
