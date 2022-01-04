<?php

namespace Tests\Feature\Permissions;

use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_permissions()
    {
        $user = $this->userWithPermission('view-permissions');
        $this->be($user);
        $permission = create(Permission::class);

        $this->get(route('admin.permissions.index'))
            ->assertOk()
            ->assertViewIs('permissions.index');
    }

    /** @test */
    public function authorized_users_can_store_permission()
    {
        $permission = make(Permission::class)->toArray();
        $permission = array_merge($permission, ['not_resource' => true, 'actions' => ['all']]);

        $this->actingAs($this->userWithPermission('create-permissions'))
            ->post(route('admin.permissions.store', $permission))
            ->assertRedirect()
            ->assertLocation(route('admin.permissions.index'));

        $this->assertDatabaseHas('permissions', Arr::only($permission, ['resource']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $permission = create(Permission::class);

        $this->actingAs($this->userWithPermission('edit-permissions'))
            ->get(route('admin.permissions.edit', $permission->name))
            ->assertOk()
            ->assertViewIs('permissions.edit');
    }

    /** @test */
    public function authorized_users_can_update_permission()
    {
        $permission = create(Permission::class);

        $data_array = [
            'name' => 'new-name',
        ];

        $this->actingAs($this->userWithPermission('edit-permissions'))
            ->put(route('admin.permissions.update', $permission->name), array_merge($permission->toArray(), $data_array))
            ->assertLocation(route('admin.permissions.show', 'new-name'));

        $this->assertDatabaseHas('permissions', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_permission()
    {
        $permission = create(Permission::class);

        $this->actingAs($this->userWithPermission('destroy-permissions'))
            ->delete(route('admin.permissions.destroy', $permission->name))
            ->assertRedirect()
            ->assertLocation(route('admin.permissions.index'));

        $this->assertDatabaseMissing('permissions', $permission->toArray());
    }
}
