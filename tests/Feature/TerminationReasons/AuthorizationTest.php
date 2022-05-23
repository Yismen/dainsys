<?php

namespace Tests\Feature\TerminationReasons;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewTerminationReason()
    {
        $termination_reason = create('App\Models\TerminationReason');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.termination_reasons.index'))
            ->assertForbidden();

        $response->get(route('admin.termination_reasons.show', $termination_reason->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetTerminationReason()
    {
        $termination_reason = create('App\Models\TerminationReason');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.termination_reasons.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditTerminationReason()
    {
        $termination_reason = create('App\Models\TerminationReason');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.termination_reasons.update', $termination_reason->id))
            ->assertForbidden();
    }
}
