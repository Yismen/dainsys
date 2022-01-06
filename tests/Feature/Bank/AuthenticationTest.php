<?php

namespace Tests\Feature\Bank;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewBanks()
    {
        $bank = create('App\Bank');

        $this->get(route('admin.banks.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        // $this->get(route('admin.banks.show', $bank->id))
        //     ->assertStatus(302)
        //     ->assertRedirect(route('login'));
    }

    // public function testGuestCantCreateBanks()
    // {
    //     $bank = create('App\Bank');

    //     $this->get(route('admin.banks.create'))
    //         ->assertStatus(302)
    //         ->assertRedirect(route('login'));

    //     $this->post(route('admin.banks.store'), $bank->toArray())
    //         ->assertStatus(302)
    //         ->assertRedirect(route('login'));
    // }

    public function testGuestCantUpdateBank()
    {
        $bank = create('App\Bank');

        $this->get(route('admin.banks.edit', $bank->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.banks.update', $bank->id), $bank->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyBank()
    {
        $bank = create('App\Bank');

        $this->delete(route('admin.banks.destroy', $bank->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
