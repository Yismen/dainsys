<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Authentication tests
     */

    /** @test */
    public function only_authenticated_users_can_force_reset_passwords()
    {
        $user = $this->user();

        $this->post(route('admin.users.settings'))
            ->assertRedirect(route('login'));
    }

    /**
     * Actions tests
     */

    /** @test */
    public function authorized_users_can_update_their_settings()
    {
        $user = $this->user();
        $this->actingAs($user);
        $attributes = [
            'layout' => 'dff',
            'skin' => 'red',
            'sidebar' => 'mini',
            'sidebar_mini' => 'show',
        ];

        $this->post(route('admin.users.settings'), $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('user_settings', ['user_id' => $user->id, 'data' => json_encode($attributes)]);
    }
}
