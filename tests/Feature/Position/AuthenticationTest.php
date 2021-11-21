<?php

namespace Tests\Feature\Positions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewPositions()
    {
        $position = create('App\Position');

        $this->get(route('admin.positions.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.positions.show', $position->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreatePositions()
    {
        $position = create('App\Position');

        $this->get(route('admin.positions.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.positions.store'), $position->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdatePosition()
    {
        $position = create('App\Position');

        $this->get(route('admin.positions.edit', $position->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.positions.update', $position->id), $position->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyPosition()
    {
        $position = create('App\Position');

        $this->delete(route('admin.positions.destroy', $position->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
