<?php

namespace Tests\Feature\TerminationTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_termination_type()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.termination_types.index'))
            ->assertForbidden();

        $response->get(route('admin.termination_types.show', $termination_type->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_termination_type()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.termination_types.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_termination_type()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.termination_types.update', $termination_type->id))
            ->assertForbidden();
    }
}
