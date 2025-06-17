<?php

namespace Tests\Feature\TerminationTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_termination_types()
    {
        $termination_type = create(\App\Models\TerminationType::class);

        $this->get(route('admin.termination_types.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.termination_types.show', $termination_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_termination_types()
    {
        $termination_type = create(\App\Models\TerminationType::class);

        $this->get(route('admin.termination_types.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.termination_types.store'), $termination_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_termination_type()
    {
        $termination_type = create(\App\Models\TerminationType::class);

        $this->get(route('admin.termination_types.edit', $termination_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.termination_types.update', $termination_type->id), $termination_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
