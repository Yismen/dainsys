<?php

namespace Tests\Feature\Shifts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_shifts()
    {
        $shift = create(\App\Models\Shift::class);

        $this->get(route('admin.shifts.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.shifts.show', $shift->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_shifts()
    {
        $shift = create(\App\Models\Shift::class);

        $this->get(route('admin.shifts.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.shifts.store'), $shift->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_shift()
    {
        $shift = create(\App\Models\Shift::class);

        $this->get(route('admin.shifts.edit', $shift->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.shifts.update', $shift->id), $shift->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_shift()
    {
        $shift = create(\App\Models\Shift::class);

        $this->delete(route('admin.shifts.destroy', $shift->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
