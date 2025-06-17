<?php

namespace Tests\Feature\Cards;

use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function card_field_is_required()
    {
        $card = create(Card::class)->toArray();

        $this->actingAs($this->userWithPermission('create-cards'))
            ->post(route('admin.cards.store'), array_merge($card, ['card' => '']))
            ->assertSessionHasErrors('card');

        $this->actingAs($this->userWithPermission('edit-cards'))
            ->put(route('admin.cards.update', $card['card']), array_merge($card, ['card' => '']))
            ->assertSessionHasErrors('card');
    }
}
