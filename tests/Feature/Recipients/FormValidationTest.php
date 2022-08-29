<?php

namespace Tests\Feature\Recipients;

use Tests\TestCase;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $recipient = create(Recipient::class)->toArray();

        $this->actingAs($this->userWithPermission('create-recipients'))
            ->post(route('admin.recipients.store'), array_merge($recipient, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-recipients'))
            ->put(route('admin.recipients.update', $recipient['id']), array_merge($recipient, ['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function email_field_is_required()
    {
        $recipient = create(Recipient::class)->toArray();

        $this->actingAs($this->userWithPermission('create-recipients'))
            ->post(route('admin.recipients.store'), array_merge($recipient, ['email' => '']))
            ->assertSessionHasErrors('email');

        $this->actingAs($this->userWithPermission('edit-recipients'))
            ->put(route('admin.recipients.update', $recipient['id']), array_merge($recipient, ['email' => '']))
            ->assertSessionHasErrors('email');
    }
}
