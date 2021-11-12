<?php

namespace Tests\Feature\Downtimes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewDowntime()
    {
        // $downtime = create('App\Downtime');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.downtimes.index'))
            ->assertForbidden();

        // $response->get(route('admin.downtimes.show', $downtime->id))
        //     ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetDowntime()
    {
        $downtime = create('App\Downtime');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.downtimes.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditDowntime()
    {
        $downtime = create('App\Downtime');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.downtimes.update', $downtime->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyDowntime()
    {
        $downtime = create('App\Downtime');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.downtimes.destroy', $downtime->id))
            ->assertForbidden();
    }
}
