<?php

namespace Tests\Feature\Api_V2;

use App\Models\Schedule;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchedulesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_schedules_collection()
    {
        factory(Schedule::class, 3)->create(['date' => now()->subDay()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/schedules');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'employee_id',
                        'employee_name',
                        'supervisor',
                        'date',
                        'hours',
                    ],
                ],
            ]);
    }

    /** @test */
    public function schedules_collection_is_filtered_by_many_days_ago_only()
    {
        $recent_schedule = create(Schedule::class, ['date' => now()->subDay()]);
        $old_schedule = create(Schedule::class, ['date' => now()->subDays(25)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/schedules?daysago=20');

        $response->assertOk()
            ->assertJsonFragment(['employee_name' => $recent_schedule->employee->full_name])
            ->assertJsonMissing(['employee_name' => $old_schedule->employee->full_name]);
    }

    /** @test */
    public function schedules_collection_is_defaults_to_90_days_ago_if_not_specified()
    {
        $recent_schedule = create(Schedule::class, ['date' => now()->subDay()]);
        $old_schedule = create(Schedule::class, ['date' => now()->subDays(91)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/schedules');

        $response->assertOk()
            ->assertJsonFragment(['employee_name' => $recent_schedule->employee->full_name])
            ->assertJsonMissing(['employee_name' => $old_schedule->employee->full_name]);
    }
}
