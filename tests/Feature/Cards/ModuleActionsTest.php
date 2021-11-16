<?php

namespace Tests\Feature\Cards;

use App\Card;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_cards()
    {
        $user = $this->userWithPermission('view-cards');
        $this->be($user);
        $card = create(Card::class);

        $this->get(route('admin.cards.index'))
            ->assertOk()
            ->assertViewIs('cards.index');
    }

    /** @test */
    public function authorized_users_can_store_card()
    {
        $card = make(Card::class)->toArray();

        $this->actingAs($this->userWithPermission('create-cards'))
            ->post(route('admin.cards.store', $card))
            ->assertRedirect()
            ->assertLocation(route('admin.cards.index'));

        $this->assertDatabaseHas('cards', $card);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $card = create(Card::class);

        $this->actingAs($this->userWithPermission('edit-cards'))
            ->get(route('admin.cards.edit', $card->card))
            ->assertOk()
            ->assertViewIs('cards.edit');
    }

    /** @test */
    public function authorized_users_can_update_card()
    {
        $card = create(Card::class);

        $data_array = [
            'card' => 55555,
        ];

        $this->actingAs($this->userWithPermission('edit-cards'))
            ->put(route('admin.cards.update', $card->card), array_merge($card->toArray(), $data_array))
            ->assertLocation(route('admin.cards.index'));

        $this->assertDatabaseHas('cards', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_card()
    {
        $card = create(Card::class);

        $this->actingAs($this->userWithPermission('destroy-cards'))
            ->delete(route('admin.cards.destroy', $card->card))
            ->assertRedirect()
            ->assertLocation(route('admin.cards.index'));

        $this->assertDatabaseMissing('cards', $card->toArray());
    }
}
