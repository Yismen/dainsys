<?php

namespace Tests\Feature\Nationalities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewNationality()
    {
        $nationality = create('App\Nationality');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.nationalities.index'))
            ->assertForbidden();

        $response->get(route('admin.nationalities.show', $nationality->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetNationality()
    {
        $nationality = create('App\Nationality');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.nationalities.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditNationality()
    {
        $nationality = create('App\Nationality');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.nationalities.update', $nationality->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyNationality()
    {
        $nationality = create('App\Nationality');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.nationalities.destroy', $nationality->id))
            ->assertForbidden();
    }
}
