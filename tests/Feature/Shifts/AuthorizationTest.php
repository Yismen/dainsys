<?php

namespace Tests\Feature\Shifts;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewShift()
    {
        $shift = create('App\Shift');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.shifts.index'))
            ->assertForbidden();

        $response->get(route('admin.shifts.show', $shift->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetShift()
    {
        $shift = create('App\Shift');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.shifts.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditShift()
    {
        $shift = create('App\Shift');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.shifts.update', $shift->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyShift()
    {
        $shift = create('App\Shift');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.shifts.destroy', $shift->id))
            ->assertForbidden();
    }
}
