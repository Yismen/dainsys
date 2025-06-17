<?php

namespace Tests\Feature\SupervisorUser;

use App\Models\Supervisor;
use App\Models\SupervisorUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_supervisor_user()
    {
        $user = create(\App\Models\User::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.supervisor_users.index'))
            ->assertForbidden();

        $response->get(route('admin.supervisor_users.show', $user->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_supervisor_user()
    {
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.supervisor_users.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_supervisor_user()
    {
        $user = create(User::class);
        $supervisor = create(Supervisor::class);
        $user->supervisors()->sync((array) $supervisor->id);
        $supervisor_user = SupervisorUser::where('user_id', $user->id)->where('supervisor_id', $supervisor->id)->first();

        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.supervisor_users.update', $supervisor_user->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_supervisor_user()
    {
        $user = create(User::class);
        $supervisor = create(Supervisor::class);
        $user->supervisors()->sync((array) $supervisor->id);
        $supervisor_user = SupervisorUser::where('user_id', $user->id)->where('supervisor_id', $supervisor->id)->first();

        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.supervisor_users.destroy', $supervisor_user->id))
            ->assertForbidden();
    }
}
