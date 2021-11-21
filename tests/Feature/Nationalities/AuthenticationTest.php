<?php

namespace Tests\Feature\Nationalities;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewNationalities()
    {
        $nationality = create('App\Nationality');

        $this->get(route('admin.nationalities.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.nationalities.show', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateNationalities()
    {
        $nationality = create('App\Nationality');

        $this->get(route('admin.nationalities.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.nationalities.store'), $nationality->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateNationality()
    {
        $nationality = create('App\Nationality');

        $this->get(route('admin.nationalities.edit', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.nationalities.update', $nationality->id), $nationality->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyNationality()
    {
        $nationality = create('App\Nationality');

        $this->delete(route('admin.nationalities.destroy', $nationality->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
