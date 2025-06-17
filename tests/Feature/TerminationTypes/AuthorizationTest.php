<?php

namespace Tests\Feature\TerminationTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewTerminationType()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.termination_types.index'))
            ->assertForbidden();

        $response->get(route('admin.termination_types.show', $termination_type->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetTerminationType()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.termination_types.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditTerminationType()
    {
        $termination_type = create(\App\Models\TerminationType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.termination_types.update', $termination_type->id))
            ->assertForbidden();
    }
}
