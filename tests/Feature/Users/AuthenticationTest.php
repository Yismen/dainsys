<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewUsers()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.users.show', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateUsers()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.users.store'), $user->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateUser()
    {
        $user = create(\App\Models\User::class);

        $this->get(route('admin.users.edit', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.users.update', $user->id), $user->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyUser()
    {
        $user = create(\App\Models\User::class);

        $this->delete(route('admin.users.destroy', $user->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
