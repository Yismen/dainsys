<?php

namespace Tests\Feature\Punches;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_punchs()
    {
        $punch = create(\App\Models\Punch::class);

        $this->get(route('admin.punches.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.punches.show', $punch->punch))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_punchs()
    {
        $punch = create(\App\Models\Punch::class);

        $this->get(route('admin.punches.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.punches.store'), $punch->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_punch()
    {
        $punch = create(\App\Models\Punch::class);

        $this->get(route('admin.punches.edit', $punch->punch))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.punches.update', $punch->punch), $punch->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_punch()
    {
        $punch = create(\App\Models\Punch::class);

        $this->delete(route('admin.punches.destroy', $punch->punch))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
