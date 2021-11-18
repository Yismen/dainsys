<?php

namespace Tests\Feature\LoginNames;

use App\LoginName;
use App\LoginNameCode;
use App\Employee;
use App\Supervisor;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_login_names()
    {
        $user = $this->userWithPermission('view-login_names');
        $this->be($user);
        $login_name = create(LoginName::class);

        $this->get(route('admin.login_names.index'))
            ->assertOk()
            ->assertViewIs('login_names.index');
    }

    /** @test */
    public function authorized_users_can_store_login_name()
    {
        $login_name = make(LoginName::class)->toArray();

        $this->actingAs($this->userWithPermission('create-login_names'))
            ->post(route('admin.login_names.store', $login_name))
            ->assertRedirect()
            ->assertLocation(route('admin.login_names.index'));

        $this->assertDatabaseHas('login_names', $login_name);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $login_name = create(LoginName::class);

        $this->actingAs($this->userWithPermission('edit-login_names'))
            ->get(route('admin.login_names.edit', $login_name->id))
            ->assertOk()
            ->assertViewIs('login_names.edit');
    }

    /** @test */
    public function authorized_users_can_update_login_name()
    {
        $login_name = create(LoginName::class);

        $data_array = [
            'login' => 'New Login name',
        ];

        $this->actingAs($this->userWithPermission('edit-login_names'))
            ->put(route('admin.login_names.update', $login_name->id), array_merge($login_name->toArray(), $data_array))
            ->assertLocation(route('admin.login_names.index'));

        $this->assertDatabaseHas('login_names', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_login_name()
    {
        $login_name = create(LoginName::class);

        $this->actingAs($this->userWithPermission('destroy-login_names'))
            ->delete(route('admin.login_names.destroy', $login_name->id))
            ->assertRedirect()
            ->assertLocation(route('admin.login_names.index'));

        $this->assertDatabaseMissing('login_names', $login_name->toArray());
    }
}
