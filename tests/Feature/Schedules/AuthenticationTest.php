<?php

namespace Tests\Feature\Schedules;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewSchedules()
    {
        $schedule = create('App\Schedule');

        $this->get(route('admin.schedules.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.schedules.show', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateSchedules()
    {
        $schedule = create('App\Schedule');

        $this->get(route('admin.schedules.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.schedules.store'), $schedule->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateSchedule()
    {
        $schedule = create('App\Schedule');

        $this->get(route('admin.schedules.edit', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.schedules.update', $schedule->id), $schedule->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroySchedule()
    {
        $schedule = create('App\Schedule');

        $this->delete(route('admin.schedules.destroy', $schedule->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
