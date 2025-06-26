<?php

namespace Tests\Feature\Nationalities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_nationalities()
    {
        $nationality = create(\App\Models\Nationality::class);

        $this->get(route('admin.nationalities.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.nationalities.show', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_nationalities()
    {
        $nationality = create(\App\Models\Nationality::class);

        $this->get(route('admin.nationalities.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.nationalities.store'), $nationality->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);

        $this->get(route('admin.nationalities.edit', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.nationalities.update', $nationality->id), $nationality->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_nationality()
    {
        $nationality = create(\App\Models\Nationality::class);

        $this->delete(route('admin.nationalities.destroy', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
