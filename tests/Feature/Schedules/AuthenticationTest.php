<?php

namespace Tests\Feature\Schedules;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_schedules()
    {
        $schedule = create(\App\Models\Schedule::class);

        $this->get(route('admin.schedules.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.schedules.show', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_schedules()
    {
        $schedule = create(\App\Models\Schedule::class);

        $this->get(route('admin.schedules.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.schedules.store'), $schedule->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);

        $this->get(route('admin.schedules.edit', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.schedules.update', $schedule->id), $schedule->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_schedule()
    {
        $schedule = create(\App\Models\Schedule::class);

        $this->delete(route('admin.schedules.destroy', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
