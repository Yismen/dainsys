<?php

namespace Tests\Feature\Profiles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_profiles()
    {
        $profile = create(\App\Models\Profile::class);

        $this->get(route('admin.profiles.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.profiles.show', $profile->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_profiles()
    {
        $profile = create(\App\Models\Profile::class);

        $this->get(route('admin.profiles.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.profiles.store'), $profile->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_profile()
    {
        $profile = create(\App\Models\Profile::class);

        $this->get(route('admin.profiles.edit', $profile->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.profiles.update', $profile->id), $profile->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    // public function testGuestCantDestroyProfile()
    // {
    //     $profile = create('App\Models\Profile');

    //     $this->delete(route('admin.profiles.destroy', $profile->id))
    //         ->assertStatus(302)
    //         ->assertRedirect(route('login'));
    // }
}
