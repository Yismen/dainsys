<?php

namespace Tests\Feature\TerminationReasons;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_termination_reason()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.termination_reasons.index'))
            ->assertForbidden();

        $response->get(route('admin.termination_reasons.show', $termination_reason->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_termination_reason()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.termination_reasons.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_termination_reason()
    {
        $termination_reason = create(\App\Models\TerminationReason::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.termination_reasons.update', $termination_reason->id))
            ->assertForbidden();
    }
}
