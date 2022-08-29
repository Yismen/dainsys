<?php

namespace Tests\Feature\Recipients;

use Tests\TestCase;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_recipients_paginated()
    {
        $user = $this->userWithPermission('view-recipients');
        $this->be($user);
        $recipient = create(Recipient::class);

        $this->get(route('admin.recipients.index'))
            ->assertOk()
            ->assertViewIs('recipients.index');
    }

    /** @test */
    public function authorized_users_can_store_recipient()
    {
        $this->withoutExceptionHandling();
        $recipient = make(Recipient::class)->toArray();

        $this->actingAs($this->userWithPermission('create-recipients'))
            ->post(route('admin.recipients.store'), $recipient)
            ->assertRedirect()
            ->assertLocation(route('admin.recipients.index'));

        $this->assertDatabaseHas('recipients', $recipient);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $recipient = create(Recipient::class);

        $this->actingAs($this->userWithPermission('edit-recipients'))
            ->get(route('admin.recipients.edit', $recipient->id))
            ->assertOk()
            ->assertViewIs('recipients.edit');
    }

    /** @test */
    public function authorized_users_can_update_recipient()
    {
        $recipient = create(Recipient::class);

        $data_array = [
            'name' => 'New Name',
            'email' => 'new_email@asdfadsf.com',
            'title' => 'new title',
        ];

        $this->actingAs($this->userWithPermission('edit-recipients'))
            ->put(route('admin.recipients.update', $recipient->id), $data_array)
            ->assertLocation(route('admin.recipients.index'));

        $this->assertDatabaseHas('recipients', $data_array);
    }

    /** @test */
    public function active_defaults_to_false_on_create()
    {
        $recipient = create(Recipient::class);

        $data_array = [
            'name' => 'New Name',
            'email' => 'new-email@asdfadsf.com',
            'title' => 'new title',
        ];

        $this->actingAs($this->userWithPermission('edit-recipients'))
            ->put(route('admin.recipients.update', $recipient->id), $data_array)
            ->assertLocation(route('admin.recipients.index'));

        $this->assertDatabaseHas('recipients', $data_array);
    }
}
