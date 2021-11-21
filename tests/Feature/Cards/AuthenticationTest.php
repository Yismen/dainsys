<?php

namespace Tests\Feature\Cards;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewCards()
    {
        $card = create('App\Card');

        $this->get(route('admin.cards.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.cards.show', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateCards()
    {
        $card = create('App\Card');

        $this->get(route('admin.cards.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.cards.store'), $card->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateCard()
    {
        $card = create('App\Card');

        $this->get(route('admin.cards.edit', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.cards.update', $card->id), $card->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyCard()
    {
        $card = create('App\Card');

        $this->delete(route('admin.cards.destroy', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
