<?php

namespace Tests\Feature\Downtimes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_downtime()
    {
        // $downtime = create('App\Models\Downtime');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.downtimes.index'))
            ->assertForbidden();

        // $response->get(route('admin.downtimes.show', $downtime->id))
        //     ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_downtime()
    {
        $downtime = create(\App\Models\Downtime::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.downtimes.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_downtime()
    {
        $downtime = create(\App\Models\Downtime::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.downtimes.update', $downtime->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_downtime()
    {
        $downtime = create(\App\Models\Downtime::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.downtimes.destroy', $downtime->id))
            ->assertForbidden();
    }
}
