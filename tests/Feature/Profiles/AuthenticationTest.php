<?php

namespace Tests\Feature\Profiles;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewProfiles()
    {
        $profile = create('App\Models\Profile');

        $this->get(route('admin.profiles.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.profiles.show', $profile->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateProfiles()
    {
        $profile = create('App\Models\Profile');

        $this->get(route('admin.profiles.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.profiles.store'), $profile->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateProfile()
    {
        $profile = create('App\Models\Profile');

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
