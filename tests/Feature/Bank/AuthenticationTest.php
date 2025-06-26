<?php

namespace Tests\Feature\Bank;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_banks()
    {
        $bank = create(\App\Models\Bank::class);

        $this->get(route('admin.banks.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        // $this->get(route('admin.banks.show', $bank->id))
        //     ->assertStatus(302)
        //     ->assertRedirect(route('login'));
    }

    // public function testGuestCantCreateBanks()
    // {
    //     $bank = create('App\Models\Bank');

    //     $this->get(route('admin.banks.create'))
    //         ->assertStatus(302)
    //         ->assertRedirect(route('login'));

    //     $this->post(route('admin.banks.store'), $bank->toArray())
    //         ->assertStatus(302)
    //         ->assertRedirect(route('login'));
    // }

    public function test_guest_cant_update_bank()
    {
        $bank = create(\App\Models\Bank::class);

        $this->get(route('admin.banks.edit', $bank->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.banks.update', $bank->id), $bank->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_bank()
    {
        $bank = create(\App\Models\Bank::class);

        $this->delete(route('admin.banks.destroy', $bank->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
