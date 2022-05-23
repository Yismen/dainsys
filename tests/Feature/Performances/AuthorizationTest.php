<?php

namespace Tests\Feature\Performances;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewPerformance()
    {
        $performance = create('App\Models\Performance');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.performances.index'))
            ->assertForbidden();

        $response->get(route('admin.performances.show', $performance->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditPerformance()
    {
        $performance = create('App\Models\Performance');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.performances.update', $performance->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyPerformance()
    {
        $performance = create('App\Models\Performance');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.performances.destroy', $performance->id))
            ->assertForbidden();
    }
}
