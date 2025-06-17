<?php

namespace Tests\Feature\Performances;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_performance()
    {
        $performance = create(\App\Models\Performance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.performances.index'))
            ->assertForbidden();

        $response->get(route('admin.performances.show', $performance->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_performance()
    {
        $performance = create(\App\Models\Performance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.performances.update', $performance->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_performance()
    {
        $performance = create(\App\Models\Performance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.performances.destroy', $performance->id))
            ->assertForbidden();
    }
}
