<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForceResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Authentication tests
     */

    /** @test */
    public function only_authenticated_users_can_see_force_reset_password_form()
    {
        $user = $this->user();

        $this->get(route('admin.users.force_reset', $user->id))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function only_authenticated_users_can_force_reset_passwords()
    {
        $user = $this->user();

        $this->post(route('admin.users.force_change', $user->id))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function only_admin_users_can_see_the_force_reset_passwords_form()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->get(route('admin.users.force_reset', $user->id))
            ->assertUnauthorized();
    }

    /** @test */
    public function only_admin_users_can_post_to_force_reset_passwords()
    {
        $user = create(User::class);
        $this->actingAs($this->user());

        $this->post(route('admin.users.force_change', $user->id))
            ->assertUnauthorized();
    }

    /**
     * Actions tests
     */

    /** @test */
    public function authorized_users_can_see_the_force_reset_passwords_form()
    {
        $user = create(User::class);
        $this->actingAs($this->userWithRole('admin'));

        $this->get(route('admin.users.force_reset', $user->id))
            ->assertOk()
            ->assertViewIs('users.force_reset');
    }

    /** @test */
    public function authorized_users_can_post_to_force_reset_passwords()
    {
        $user = create(User::class);
        $this->actingAs($this->userWithRole('admin'));

        $this->post(route('admin.users.force_change', $user->id))
            ->assertRedirect(route('admin.users.force_reset', $user->id));
    }

    /** @test */
    public function authorized_users_can_not_force_reset_their_own_password()
    {
        $user = $this->userWithRole('admin');
        $this->actingAs($user);

        $this->post(route('admin.users.force_change', $user->id))
            ->assertSessionHasErrors(['error' => 'You are not allowed to change your own password here!'])
            ->assertRedirect();
    }
}
