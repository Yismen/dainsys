<?php

namespace Tests\Feature\Nationalities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.nationalities.index'))
            ->assertForbidden();

        $response->get(route('admin.nationalities.show', $nationality->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.nationalities.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.nationalities.update', $nationality->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.nationalities.destroy', $nationality->id))
            ->assertForbidden();
    }
}
