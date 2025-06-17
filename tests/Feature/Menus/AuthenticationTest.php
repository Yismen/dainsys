<?php

namespace Tests\Feature\Menus;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_menus()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.menus.show', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_menus()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.menus.store'), $menu->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_menu()
    {
        $menu = create(\App\Models\Menu::class);

        $this->get(route('admin.menus.edit', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.menus.update', $menu->id), $menu->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_menu()
    {
        $menu = create(\App\Models\Menu::class);

        $this->delete(route('admin.menus.destroy', $menu->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
