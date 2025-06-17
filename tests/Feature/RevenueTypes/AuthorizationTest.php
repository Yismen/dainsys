<?php

namespace Tests\Feature\RevenueTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.revenue_types.index'))
            ->assertForbidden();

        $response->get(route('admin.revenue_types.show', $revenue_type->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.revenue_types.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.revenue_types.update', $revenue_type->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_revenue_type()
    {
        $revenue_type = create(\App\Models\RevenueType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.revenue_types.destroy', $revenue_type->id))
            ->assertForbidden();
    }
}
