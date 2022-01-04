<?php

namespace Tests\Feature\Menus;

use App\Menu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_menus()
    {
        $user = $this->userWithPermission('view-menus');
        $this->be($user);
        $menu = create(Menu::class);

        $this->get(route('admin.menus.index'))
            ->assertOk()
            ->assertViewIs('menus.index');
    }

    /** @test */
    public function authorized_users_can_store_menu()
    {
        $menu = make(Menu::class)->toArray();

        $this->actingAs($this->userWithPermission('create-menus'))
            ->post(route('admin.menus.store', $menu))
            ->assertRedirect(route('admin.menus.index'));

        $this->assertDatabaseHas('menus', ['description' => $menu['description']]);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $menu = create(Menu::class);

        $this->actingAs($this->userWithPermission('edit-menus'))
            ->get(route('admin.menus.edit', $menu->id))
            ->assertOk()
            ->assertViewIs('menus.edit');
    }

    /** @test */
    public function authorized_users_can_update_menu()
    {
        $menu = create(Menu::class);

        $data_array = [
            'name' => 'new name',
        ];

        $this->actingAs($this->userWithPermission('edit-menus'))
            ->put(route('admin.menus.update', $menu->id), array_merge($menu->toArray(), $data_array))
            ->assertLocation(route('admin.menus.show', $menu->id));

        $this->assertDatabaseHas('menus', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_menu()
    {
        $menu = create(Menu::class);

        $this->actingAs($this->userWithPermission('destroy-menus'))
            ->delete(route('admin.menus.destroy', $menu->id))
            ->assertRedirect()
            ->assertLocation(route('admin.menus.index'));

        $this->assertDatabaseMissing('menus', $menu->toArray());
    }
}
