<?php

namespace Tests\Feature\PaymentTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_payment_types()
    {
        $payment_type = create(\App\Models\PaymentType::class);

        $this->get(route('admin.payment_types.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.payment_types.show', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_payment_types()
    {
        $payment_type = create(\App\Models\PaymentType::class);

        $this->get(route('admin.payment_types.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.payment_types.store'), $payment_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);

        $this->get(route('admin.payment_types.edit', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.payment_types.update', $payment_type->id), $payment_type->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);

        $this->delete(route('admin.payment_types.destroy', $payment_type->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
