<?php

namespace Tests\Feature\Menus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewMenu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.menus.index'))
            ->assertForbidden();

        $response->get(route('admin.menus.show', $menu->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetMenu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.menus.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditMenu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.menus.update', $menu->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyMenu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.menus.destroy', $menu->id))
            ->assertForbidden();
    }
}
