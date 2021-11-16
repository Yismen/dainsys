<?php

namespace Tests\Feature\RevenueTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewRevenueType()
    {
        $revenue_type = create('App\RevenueType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.revenue_types.index'))
            ->assertForbidden();

        $response->get(route('admin.revenue_types.show', $revenue_type->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetRevenueType()
    {
        $revenue_type = create('App\RevenueType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.revenue_types.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditRevenueType()
    {
        $revenue_type = create('App\RevenueType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.revenue_types.update', $revenue_type->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyRevenueType()
    {
        $revenue_type = create('App\RevenueType');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.revenue_types.destroy', $revenue_type->id))
            ->assertForbidden();
    }
}
