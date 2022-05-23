<?php

namespace Tests\Feature;

use App\Models\Campaign;
use Tests\TestCase;
use App\Models\Performance;
use App\Models\RevenueType;
use Illuminate\Support\Facades\Queue;
use App\Console\Commands\UpdateBillableHours;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\UpdateBillableHours as JobsUpdateBillableHours;

class UpdateBillableHoursTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function billable_hours_job_is_queued()
    {
        Queue::fake();

        $this->artisan(UpdateBillableHours::class);

        Queue::assertPushed(JobsUpdateBillableHours::class);
    }

    /** @test */
    public function billable_hours_is_updated_to_production_time_when_revenue_type_is_sales_or_production()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Sales Or Production']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
        ]);

        $this->artisan(UpdateBillableHours::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->production_time,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_is_updated_to_production_time_when_revenue_type_is_production_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Production Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
        ]);

        $this->artisan(UpdateBillableHours::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->production_time,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_is_updated_to_talk_time_when_revenue_type_is_talk_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Talk Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
        ]);

        $this->artisan(UpdateBillableHours::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->talk_time,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
        ]);
    }

    /** @test */
    public function billable_hours_is_updated_to_login_time_when_revenue_type_is_login_time()
    {
        $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
        $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
        $performance = factory(Performance::class)->create([
            'campaign_id' => $campaign->id,
            'login_time' => 10,
            'production_time' => 9,
            'talk_time' => 8,
            'billable_hours' => 4,
        ]);

        $this->artisan(UpdateBillableHours::class);

        $this->assertDatabaseHas('performances', [
            'billable_hours' => $performance->login_time,
        ]);

        $this->assertDatabaseMissing('performances', [
            'billable_hours' => 4,
        ]);
    }

    // /** @test */
    // public function billable_hours_only_update_specified_revenue_type()
    // {
    //     $revenue_type_1 = factory(RevenueType::class)->create(['name' => 'Login Time']);
    //     $revenue_type_2 = factory(RevenueType::class)->create(['name' => 'Talk Time']);
    //     $campaign_1 = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type_1->id]);
    //     $campaign_2 = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type_2->id]);
    //     $performance_1 = factory(Performance::class)->create([
    //         'campaign_id' => $campaign_1->id,
    //         'login_time' => 10,
    //         'production_time' => 10,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);
    //     $performance_2 = factory(Performance::class)->create([
    //         'campaign_id' => $campaign_2->id,
    //         'login_time' => 10,
    //         'production_time' => 10,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);

    //     $this->artisan(UpdateBillableHours::class, [
    //         '--revenue_type' => $revenue_type_1->name
    //     ]);

    //     $this->assertDatabaseHas('performances', [
    //         'id' => $performance_1->id,
    //         'campaign_id' => $campaign_1->id,
    //         'billable_hours' => 10,
    //     ]);

    //         $this->assertDatabaseHas('performances', [
    //         'id' => $performance_2->id,
    //         'campaign_id' => $campaign_2->id,
    //         'billable_hours' => 4,
    //     ]);
    // }

    // /** @test */
    // public function billable_hours_only_update_records_for_after_certain_amount_of_days()
    // {
    //     $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
    //     $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
    //     $performance_1 = factory(Performance::class)->create([
    //         'date' => now(),
    //         'campaign_id' => $campaign->id,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);
    //     $performance_2 = factory(Performance::class)->create([
    //         'date' => now()->subMonths(2),
    //         'campaign_id' => $campaign->id,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);

    //     $this->artisan(UpdateBillableHours::class, [
    //         '--days' => 4
    //     ]);

    //     $this->assertDatabaseHas('performances', [
    //         'id' => $performance_1->id,
    //         'campaign_id' => $campaign->id,
    //         'billable_hours' => 10,
    //     ]);

    //     $this->assertDatabaseHas('performances', [
    //         'id' => $performance_2->id,
    //         'campaign_id' => $campaign->id,
    //         'billable_hours' => 4,
    //     ]);
    // }

    // /** @test */
    // public function billable_hours_only_update_last_day_if_days_is_not_specified()
    // {
    //     $revenue_type = factory(RevenueType::class)->create(['name' => 'Login Time']);
    //     $campaign = factory(Campaign::class)->create(['revenue_type_id' => $revenue_type->id]);
    //     $performance_previous_day = factory(Performance::class)->create([
    //         'date' => now()->subDay(),
    //         'campaign_id' => $campaign->id,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);
    //     $performance_older_than_one_day = factory(Performance::class)->create([
    //         'date' => now()->subMonths(4),
    //         'campaign_id' => $campaign->id,
    //         'login_time' => 10,
    //         'billable_hours' => 4,
    //     ]);

    //     $this->artisan(UpdateBillableHours::class);

    //     $this->assertDatabaseHas('performances', [
    //         'id' => $performance_previous_day->id,
    //         'campaign_id' => $campaign->id,
    //         'billable_hours' => 10,
    //      ]);

    //     $this->assertDatabaseHas('performances', [
    //         'id' => $performance_older_than_one_day->id,
    //         'campaign_id' => $campaign->id,
    //         'billable_hours' => 4,
    //     ]);
    //  }
}
