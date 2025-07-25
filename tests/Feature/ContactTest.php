<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_see_their_contacts()
    {
        $user = create(\App\Models\User::class);
        $contact = $user->contacts()->create(
            \App\Models\Contact::factory()->raw()
        );

        $this->actingAs($user);

        $this->get(route('admin.contacts.index'))
            ->assertSee($contact->name);
    }

    /** @test */
    public function users_cant_see_contacts_created_by_another_user()
    {
        $user = create(\App\Models\User::class);
        $contact = $user->contacts()->create(
            \App\Models\Contact::factory()->raw()
        );

        $this->actingAs(create(\App\Models\User::class));

        $this->get(route('admin.contacts.index'))
            ->assertDontSee(e($contact->name));
    }

    /** @test */
    public function a_user_can_see_details_of_an_owned_contact()
    {
        $user = create(\App\Models\User::class);
        $contact = $user->contacts()->create(
            \App\Models\Contact::factory()->raw()
        );

        $this->actingAs($user);

        $this->get(route('admin.contacts.show', $contact->id))
            ->assertSee($contact->name);
    }

    /** @test */
    public function users_cant_see_details_of_not_owned_contacts()
    {
        $user = create(\App\Models\User::class);
        $contact = $user->contacts()->create(
            \App\Models\Contact::factory()->raw()
        );

        $this->actingAs(create(\App\Models\User::class));

        $this->get(route('admin.contacts.show', $contact->id))
            ->assertStatus(404);
    }
}
