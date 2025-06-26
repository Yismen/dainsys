<?php

namespace Tests\Feature\Cards;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_card()
    {
        $card = create(\App\Models\Card::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.cards.index'))
            ->assertForbidden();

        $response->get(route('admin.cards.show', $card->card))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_card()
    {
        $card = create(\App\Models\Card::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.cards.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_card()
    {
        $card = create(\App\Models\Card::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.cards.update', $card->card))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_card()
    {
        $card = create(\App\Models\Card::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.cards.destroy', $card->card))
            ->assertForbidden();
    }
}
