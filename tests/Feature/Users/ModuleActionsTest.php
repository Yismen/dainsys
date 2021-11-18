<?php

namespace Tests\Feature\Users;

use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

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
        $this->withoutExceptionHandling();
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

        $this->assertDatabaseMissing('users', $user->toArray());
    }
}
