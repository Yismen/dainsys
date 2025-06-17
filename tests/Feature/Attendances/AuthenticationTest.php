<?php

namespace Tests\Feature\Attendances;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_attendances()
    {
        $attendance = create(\App\Models\Attendance::class);

        $this->get(route('admin.attendances.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.attendances.show', $attendance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_attendances()
    {
        $attendance = create(\App\Models\Attendance::class);

        $this->get(route('admin.attendances.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.attendances.store'), $attendance->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);

        $this->get(route('admin.attendances.edit', $attendance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.attendances.update', $attendance->id), $attendance->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);

        $this->delete(route('admin.attendances.destroy', $attendance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
