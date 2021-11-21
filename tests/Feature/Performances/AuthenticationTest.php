<?php

namespace Tests\Feature\Performances;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewPerformances()
    {
        $performance = create('App\Performance');

        $this->get(route('admin.performances.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.performances.show', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdatePerformance()
    {
        $performance = create('App\Performance');

        $this->get(route('admin.performances.edit', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.performances.update', $performance->id), $performance->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyPerformance()
    {
        $performance = create('App\Performance');

        $this->delete(route('admin.performances.destroy', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
