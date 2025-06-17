<?php

namespace Tests\Feature\SupervisorUser;

use App\Models\Supervisor;
use App\Models\SupervisorUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_supervisor_users()
    {
        $user = create(\App\Models\User::class);
        $supervisor = create(\App\Models\Supervisor::class);

        $this->get(route('admin.supervisor_users.index'))->assertRedirect('/login');
    }

    public function test_guest_cant_edit_supervisor_users()
    {
        $user = create(User::class);
        $supervisor = create(Supervisor::class);
        $user->supervisors()->sync((array) $supervisor->id);

        $supervisor_user = SupervisorUser::where('user_id', $user->id)->where('supervisor_id', $supervisor->id)->first();

        $this->put(route('admin.supervisor_users.update', $supervisor_user->id))->assertRedirect('/login');
    }

    public function test_guest_cant_destroy_supervisor_user()
    {
        $user = create(User::class);
        $supervisor = create(Supervisor::class);
        $user->supervisors()->sync((array) $supervisor->id);

        $supervisor_user = SupervisorUser::where('user_id', $user->id)->where('supervisor_id', $supervisor->id)->first();

        $this->delete(route('admin.supervisor_users.destroy', $supervisor_user->id))->assertRedirect('/login');
    }
}
