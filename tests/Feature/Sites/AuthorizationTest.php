<?php

namespace Tests\Feature\Sites;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_site()
    {
        $site = create(\App\Models\Site::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.sites.index'))
            ->assertForbidden();

        $response->get(route('admin.sites.show', $site->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_site()
    {
        $site = create(\App\Models\Site::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.sites.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_site()
    {
        $site = create(\App\Models\Site::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.sites.update', $site->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_site()
    {
        $site = create(\App\Models\Site::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.sites.destroy', $site->id))
            ->assertForbidden();
    }
}
