<?php

namespace Tests\Feature\Roles;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_roles()
    {
        $user = $this->userWithPermission('view-roles');
        $this->be($user);
        $role = create(Role::class);

        $this->get(route('admin.roles.index'))
            ->assertOk()
            ->assertViewIs('roles.index');
    }

    /** @test */
    public function authorized_users_can_store_role()
    {
        $role = make(Role::class)->toArray();
        $users = create(User::class, [], 5)->pluck('id')->toArray();
        $role = array_merge($role, ['users' => $users]);

        $this->actingAs($this->userWithPermission('create-roles'))
            ->post(route('admin.roles.store'), $role)
            ->assertRedirect()
            ->assertLocation(route('admin.roles.index'));

        $this->assertDatabaseHas('roles', Arr::only($role, ['name']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $role = create(Role::class);

        $this->actingAs($this->userWithPermission('edit-roles'))
            ->get(route('admin.roles.edit', $role->name))
            ->assertOk()
            ->assertViewIs('roles.edit');
    }

    /** @test */
    public function authorized_users_can_update_role()
    {
        $role = create(Role::class);
        $users = create(User::class, [], 5)->pluck('id')->toArray();
        $role = array_merge($role->toArray(), ['users' => $users]);

        $data_array = [
            'name' => 'new-name',
        ];

        $this->actingAs($this->userWithPermission('edit-roles'))
            ->put(route('admin.roles.update', $role['name']), array_merge($role, $data_array))
            ->assertLocation(route('admin.roles.show', 'new-name'));

        $this->assertDatabaseHas('roles', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_role()
    {
        $role = create(Role::class);

        $this->actingAs($this->userWithPermission('destroy-roles'))
            ->delete(route('admin.roles.destroy', $role->name))
            ->assertRedirect()
            ->assertLocation(route('admin.roles.index'));

        $this->assertDatabaseMissing('roles', $role->toArray());
    }
}
