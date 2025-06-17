<?php

namespace Tests\Feature\Recipients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_recipients()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.recipients.show', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_recipients()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.recipients.store'), $recipient->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.edit', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.recipients.update', $recipient->id), $recipient->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_recipient()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->delete(route('admin.recipients.destroy', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
