<?php

namespace Tests\Feature\Cards;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_cards()
    {
        $card = create(\App\Models\Card::class);

        $this->get(route('admin.cards.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.cards.show', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_cards()
    {
        $card = create(\App\Models\Card::class);

        $this->get(route('admin.cards.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.cards.store'), $card->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_card()
    {
        $card = create(\App\Models\Card::class);

        $this->get(route('admin.cards.edit', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.cards.update', $card->id), $card->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_card()
    {
        $card = create(\App\Models\Card::class);

        $this->delete(route('admin.cards.destroy', $card->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
