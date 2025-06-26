<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_users()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.users.show', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_users()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.users.store'), $user->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_user()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.edit', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.users.update', $user->id), $user->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_user()
    {
        $user = create(\App\Models\User::class);

        $this->delete(route('admin.users.destroy', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
