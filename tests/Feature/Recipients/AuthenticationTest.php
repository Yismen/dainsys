<?php

namespace Tests\Feature\Recipients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewRecipients()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.recipients.show', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateRecipients()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.recipients.store'), $recipient->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateRecipient()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->get(route('admin.recipients.edit', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.recipients.update', $recipient->id), $recipient->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyRecipient()
    {
        $recipient = create(\App\Models\Recipient::class);

        $this->delete(route('admin.recipients.destroy', $recipient->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
