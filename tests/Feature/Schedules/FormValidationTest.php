<?php

namespace Tests\Feature\Schedules;

use App\Models\Schedule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function date_field_is_required()
    {
        $schedule = create(Schedule::class)->toArray();

        $this->actingAs($this->userWithPermission('create-schedules'))
            ->post(route('admin.schedules.store'), array_merge($schedule, ['date' => '']))
            ->assertSessionHasErrors('date');

        $this->actingAs($this->userWithPermission('edit-schedules'))
            ->put(route('admin.schedules.update', $schedule['id']), array_merge($schedule, ['date' => '']))
            ->assertSessionHasErrors('date');
    }
}
