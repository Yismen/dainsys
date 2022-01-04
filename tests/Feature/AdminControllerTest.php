<?php

namespace Tests\Feature;

use App\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_are_redirected_on_admin()
    {
        $request = $this->get('/admin');

        $request->assertRedirect(route('login'));
    }

    /** @test */
    public function athenticated_users_without_profile_are_redirected_to_create_one()
    {
        $this->actingAs($this->user());

        $request = $this->get('/admin');

        $request->assertRedirect(route('admin.profiles.create'));
    }

    /** @test */
    public function athenticated_users_can_see_admin_dashboard()
    {
        $profile = create(Profile::class);
        $this->actingAs($profile->user);

        $request = $this->get('/admin');

        $request->assertRedirect(route('admin.dashboards'));
    }
}
