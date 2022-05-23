<?php

namespace Tests\Feature\Api;

use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SchedulesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_schedules_collection()
    {
        factory(Schedule::class, 3)->create(['date' => now()->subDay()]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/schedules');

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
    public function it_returns_a_schedules_for_many_days_ago_only()
    {
        $recent_schedule = create(Schedule::class, ['date' => now()->subDay()]);
        $old_schedule = create(Schedule::class, ['date' => now()->subDays(25)]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/schedules?daysago=20');

        $response->assertOk()
            ->assertJsonFragment(['employee_name' => $recent_schedule->employee->full_name])
            ->assertJsonMissing(['employee_name' => $old_schedule->employee->full_name]);
    }
}
