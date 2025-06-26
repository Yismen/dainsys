<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_users()
    {
        $user = $this->userWithPermission('view-users');
        $this->be($user);
        $user = create(User::class);

        $this->get(route('admin.users.index'))
            ->assertOk()
            ->assertViewIs('users.index');
    }

    /** @test */
    public function authorized_users_can_store_user()
    {
        $user = make(User::class)->toArray();
        $user['password'] = 'password';
        $user['username'] = 'username';

        $this->actingAs($this->userWithPermission('create-users'))
            ->post(route('admin.users.store'), $user)
            ->assertRedirect()
            ->assertLocation(route('admin.users.index'));

        $this->assertDatabaseHas('users', Arr::only($user, ['name', 'email', 'username']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $user = create(User::class);

        $this->actingAs($this->userWithPermission('edit-users'))
            ->get(route('admin.users.edit', $user->id))
            ->assertOk()
            ->assertViewIs('users.edit');
    }

    /** @test */
    public function authorized_users_can_update_user()
    {
        $user = create(User::class)->toArray();

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-users'))
            ->put(route('admin.users.update', $user['id']), array_merge($user, $data_array))
            ->assertLocation(route('admin.users.index'));

        $this->assertDatabaseHas('users', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_user()
    {
        $user = create(User::class);

        $this->actingAs($this->userWithPermission('destroy-users'))
            ->delete(route('admin.users.destroy', $user->id))
            ->assertRedirect()
            ->assertLocation(route('admin.users.index'));

        $this->assertDatabaseMissing('users', $user->toArray())
            ->assertSoftDeleted('users', Arr::only($user->toArray(), ['name', 'email']));
    }

    /** @test */
    public function users_can_not_destroy_their_own_user()
    {
        $user = $this->userWithPermission('destroy-users');
        $attributes = Arr::only($user->toArray(), ['name', 'email']);

        $this->actingAs($user)
            ->delete(route('admin.users.destroy', $user->id))
            ->assertRedirect(route('admin.users.edit', $user->id));

        $this->assertDatabaseHas('users', $attributes)
            ->assertNotSoftDeleted('users', $attributes);
    }

    /** @test */
    public function is_admin_user_can_not_deleted_or_inactivated()
    {
        $user = $this->userWithPermission('destroy-users');
        $admin_user = $this->user(['is_admin' => true]);
        $attributes = Arr::only($admin_user->toArray(), ['name', 'email']);

        $this->actingAs($user)
            ->delete(route('admin.users.destroy', $admin_user->id))
            ->assertRedirect(route('admin.users.edit', $admin_user->id));

        $this->assertDatabaseHas('users', $attributes)
            ->assertNotSoftDeleted('users', $attributes);
    }

    /** @test */
    public function users_with_admin_role_can_not_deleted_or_inactivated()
    {
        $user = $this->userWithPermission('destroy-users');
        $admin_user = $this->userWithRole('admin');
        $attributes = Arr::only($admin_user->toArray(), ['name', 'email']);

        $this->actingAs($user)
            ->delete(route('admin.users.destroy', $admin_user->id))
            ->assertRedirect(route('admin.users.edit', $admin_user->id));

        $this->assertDatabaseHas('users', $attributes)
            ->assertNotSoftDeleted('users', $attributes);
    }

    /** @test */
    public function it_shows_inactive_users()
    {
        $user = $this->userWithPermission('destroy-users');
        $inactive_user = create(User::class);
        $inactive_user->delete();

        $this->actingAs($user)
            ->get(route('admin.users.inactive-users'))
            ->assertOk()
            ->assertViewIs('users.inactives')
            ->assertSee($inactive_user->name);
    }

    /** @test */
    public function it_restore_inactive_users()
    {
        $user = $this->userWithPermission('destroy-users');
        $inactive_user = create(User::class);
        $inactive_user->delete();
        $attributes = Arr::only($inactive_user->toArray(), ['name', 'email']);

        $this->actingAs($user)
            ->post(route('admin.users.inactive-users.restore', $inactive_user->id))
            ->assertRedirect(route('admin.users.inactive-users'));

        $this->assertNotSoftDeleted('users', $attributes);
    }
}
