<?php

namespace Tests\Feature\Menus;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_menu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.menus.index'))
            ->assertForbidden();

        $response->get(route('admin.menus.show', $menu->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_menu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.menus.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_menu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.menus.update', $menu->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_menu()
    {
        $menu = create(\App\Models\Menu::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.menus.destroy', $menu->id))
            ->assertForbidden();
    }
}
