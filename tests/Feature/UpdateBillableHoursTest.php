<?php

namespace Tests\Feature;

use App\Campaign;
use Tests\TestCase;
use App\Performance;
use App\RevenueType;
use App\Console\Commands\UpdateBillableHours;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateBillableHoursTest extends TestCase
{
    use RefreshDatabase;

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
            'login_time' => 8,
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
}
