<?php

namespace Tests\Feature\Menus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewMenus()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.menus.show', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateMenus()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.menus.store'), $menu->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateMenu()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.edit', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.menus.update', $menu->id), $menu->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyMenu()
    {
        $menu = create(\App\Models\Menu::class);

        $this->delete(route('admin.menus.destroy', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
