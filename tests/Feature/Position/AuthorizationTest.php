<?php

namespace Tests\Feature\Position;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewPosition()
    {
        $position = create('App\Models\Position');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.positions.index'))
            ->assertForbidden();

        $response->get(route('admin.positions.show', $position->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetPosition()
    {
        $position = create('App\Models\Position');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.positions.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditPosition()
    {
        $position = create('App\Models\Position');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.positions.update', $position->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyPosition()
    {
        $position = create('App\Models\Position');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.positions.destroy', $position->id))
            ->assertForbidden();
    }
}
