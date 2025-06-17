<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLoginsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_session_is_created_when_user_log_in()
    {
        $user = User::factory()->create();

        auth()->login($user);

        $this->assertDatabaseHas('user_logins', [
            'user_id' => $user->id,
            'logged_in_at' => now()->format('Y-m-d H:i:s'),
            'logged_out_at' => null,
        ]);
    }

    /** @test */
    public function a_session_is_closed_when_user_log_out()
    {
        $user = User::factory()->create();
        auth()->login($user);

        auth()->logout();

        $this->assertDatabaseHas('user_logins', [
            'user_id' => $user->id,
            'logged_out_at' => now()->format('Y-m-d H:i:s'),
        ]);

        $this->assertDatabaseMissing('user_logins', [
            'user_id' => $user->id,
            'logged_out_at' => null,
        ]);
    }

    /** @test */
    public function a_session_is_casted()
    {
        $user = User::factory()->create();

        auth()->login($user);

        $this->assertTrue($user->is_logged_in);

        auth()->logout();

        $this->assertFalse($user->is_logged_in);
    }
}
