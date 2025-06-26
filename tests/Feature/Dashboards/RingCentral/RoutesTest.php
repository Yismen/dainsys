<?php

namespace Tests\Feature\Dashboards\RingCentral;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_can_not_see_dashboards()
    {
        $this->get(route('admin.dashboards.ring_central'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function users_without_any_role_are_rendered_with_default_dashboard()
    {
        $this->actingAs($this->user());

        $response = $this->get(route('admin.dashboards.ring_central'));

        $response->assertForbidden();
    }

    /** @test */
    // public function users_with_role_ring_central_manager_are_rendered_with_dashboard()
    // {
    //     $this->actingAs($this->userWithPermission('view-ring-central-dashboard'));

    //     $response = $this->get(route('admin.dashboards.ring_central'));

    //     $response->assertOk();
    //     $response->assertViewIs('dashboards.ring-central.manager');
    // }
}
