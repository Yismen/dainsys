<?php

namespace Tests\Feature\Performances;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_performances()
    {
        $performance = create(\App\Models\Performance::class);

        $this->get(route('admin.performances.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.performances.show', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_performance()
    {
        $performance = create(\App\Models\Performance::class);

        $this->get(route('admin.performances.edit', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.performances.update', $performance->id), $performance->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_performance()
    {
        $performance = create(\App\Models\Performance::class);

        $this->delete(route('admin.performances.destroy', $performance->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
