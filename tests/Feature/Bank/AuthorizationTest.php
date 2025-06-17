<?php

namespace Tests\Feature\Bank;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_bank()
    {
        $bank = create(\App\Models\Bank::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.banks.index'))
            ->assertForbidden();

        // $response->get(route('admin.banks.show', $bank->id))
        //     ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_bank()
    {
        $bank = create(\App\Models\Bank::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.banks.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_bank()
    {
        $bank = create(\App\Models\Bank::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.banks.update', $bank->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_bank()
    {
        $bank = create(\App\Models\Bank::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.banks.destroy', $bank->id))
            ->assertForbidden();
    }
}
