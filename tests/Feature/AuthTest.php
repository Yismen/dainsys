<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_login_form()
    {
        $response = $this->get('/login');

        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function it_validates_request_before_login()
    {
        $attributes = [
            'email' => '',
            'password' => '',
        ];

        $response = $this->post('/login');

        $response->assertInvalid(array_keys($attributes));

        $attributes = [
            'email' => 'Not an email',
            'password' => 'short',
        ];

        $response = $this->post('/login');

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_authenticates_user()
    {
        $password = 'randomPassword';
        $user = $this->user(['password' => bcrypt($password)]);

        $attributes = [
            'email' => $user->email,
            'password' => $password,
        ];

        $this->post('/login', $attributes);

        $this->assertAuthenticated();
    }

    /** @test */
    public function users_are_redirected_to_admin()
    {
        $password = 'randomPassword';
        $user = $this->user(['password' => bcrypt($password)]);

        $attributes = [
            'email' => $user->email,
            'password' => $password,
        ];

        $response = $this->post('/login', $attributes);

        $response->assertRedirect('/admin');
    }

    /** @test */
    public function users_can_log_out()
    {
        $this->actingAs($this->user());

        $this->post('/logout');

        $this->assertGuest();
    }

    /** @test */
    public function it_shows_forgot_password_form()
    {
        $response = $this->get('/password/reset');

        $response->assertViewIs('auth.passwords.email');
    }

    /** @test */
    public function it_validates_request_before_seding_email_to_reset_password()
    {
        $attributes = [
            'email' => '',
        ];

        $response = $this->post('/password/email', $attributes);

        $response->assertInvalid(array_keys($attributes));

        $attributes = [
            'email' => 'notAnEmail',
        ];

        $response = $this->post('/password/email', $attributes);

        $response->assertInvalid(array_keys($attributes));

        $attributes = [
            'email' => 'this.email@not.exists',
        ];

        $response = $this->post('/password/email', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_sends_an_email_to_reset_password()
    {
        Notification::fake();
        $user = $this->user();

        $this->post('/password/email', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }
}
