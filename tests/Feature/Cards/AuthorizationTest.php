<?php

namespace Tests\Feature\Cards;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewCard()
    {
        $card = create('App\Card');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.cards.index'))
            ->assertForbidden();

        $response->get(route('admin.cards.show', $card->card))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetCard()
    {
        $card = create('App\Card');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.cards.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditCard()
    {
        $card = create('App\Card');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.cards.update', $card->card))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyCard()
    {
        $card = create('App\Card');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.cards.destroy', $card->card))
            ->assertForbidden();
    }
}
