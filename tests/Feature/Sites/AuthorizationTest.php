<?php

namespace Tests\Feature\Sites;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewSite()
    {
        $site = create('App\Site');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.sites.index'))
            ->assertForbidden();

        $response->get(route('admin.sites.show', $site->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetSite()
    {
        $site = create('App\Site');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.sites.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditSite()
    {
        $site = create('App\Site');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.sites.update', $site->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroySite()
    {
        $site = create('App\Site');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.sites.destroy', $site->id))
            ->assertForbidden();
    }
}
