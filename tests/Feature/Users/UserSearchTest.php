<?php

namespace Tests\Feature\Users;

use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserSearchTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Authentication tests
     */

    /** @test */
    public function only_authenticated_users_can_search_for_users()
    {
        $user = $this->user();

        $this->get(route('admin.users.search'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function it_searches_for_users()
    {
        $user = create(User::class);
        $this->actingAs($this->user());

        $this->get(route('admin.users.search'))
            ->assertOk()
            ->assertViewIs('partials._users');
    }

    /** @test */
    public function it_filter_users_on_searching()
    {
        $user_1 = create(User::class);
        $user_2 = create(User::class);
        $this->actingAs($this->user());

        $this->get(route('admin.users.search', ['q' => $user_1->name]))
            ->assertOk()
            ->assertViewIs('partials._users')
            ->assertSee($user_1->name)
            ->assertDontSee($user_2->name);
    }
}
