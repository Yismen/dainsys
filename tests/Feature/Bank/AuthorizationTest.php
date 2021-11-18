<?php

namespace Tests\Feature\Banks;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewBank()
    {
        $bank = create('App\Bank');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.banks.index'))
            ->assertForbidden();

        // $response->get(route('admin.banks.show', $bank->id))
        //     ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetBank()
    {
        $bank = create('App\Bank');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.banks.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditBank()
    {
        $bank = create('App\Bank');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.banks.update', $bank->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyBank()
    {
        $bank = create('App\Bank');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.banks.destroy', $bank->id))
            ->assertForbidden();
    }
}
