<?php

namespace Tests\Feature\TerminationReasons;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_termination_reasons()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);

        $this->get(route('admin.termination_reasons.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.termination_reasons.show', $termination_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_termination_reasons()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);

        $this->get(route('admin.termination_reasons.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.termination_reasons.store'), $termination_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_termination_reason()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);

        $this->get(route('admin.termination_reasons.edit', $termination_reason->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.termination_reasons.update', $termination_reason->id), $termination_reason->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
