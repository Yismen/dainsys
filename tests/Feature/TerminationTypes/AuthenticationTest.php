<?php

namespace Tests\Feature\TerminationTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewTerminationTypes()
    {
        $termination_type = create('App\TerminationType');

        $this->get(route('admin.termination_types.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.termination_types.show', $termination_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateTerminationTypes()
    {
        $termination_type = create('App\TerminationType');

        $this->get(route('admin.termination_types.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.termination_types.store'), $termination_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateTerminationType()
    {
        $termination_type = create('App\TerminationType');

        $this->get(route('admin.termination_types.edit', $termination_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.termination_types.update', $termination_type->id), $termination_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
