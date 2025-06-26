<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ResetPasswordsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Authentication tests
     */

    /** @test */
    public function only_authenticated_users_can_reset_password()
    {
        $user = $this->user();

        $this->get(route('admin.users.reset-password'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_see_reset_password_form()
    {
        $this->actingAs($this->user());

        $this->get(route('admin.users.reset-password'))
            ->assertOk()
            ->assertViewIs('users.reset');
    }

    /** @test */
    public function it_validates_before_reseting_user_password()
    {
        $this->actingAs($this->user());
        $attributes = [
            'old_password',
            'new_password',
            'new_password_confirmation' => 'different',
        ];

        $this->post(route('admin.users.change-password'), $attributes)
            ->assertInvalid([
                'old_password',
                'new_password',
                'new_password_confirmation',
            ]);
    }

    /** @test */
    public function it_change_user_password()
    {
        $old_password = 'old password';
        $new_password = 'new password';
        $user = $this->user(['password' => bcrypt($old_password)]);
        $this->actingAs($user);

        $attributes = [
            'old_password' => $old_password,
            'new_password' => $new_password,
            'new_password_confirmation' => $new_password,
        ];

        $this->post(route('admin.users.change-password'), $attributes);

        $user = User::where('email', $user->email)->first();

        $this->assertTrue(Hash::check($attributes['new_password'], $user->password));
    }
}
