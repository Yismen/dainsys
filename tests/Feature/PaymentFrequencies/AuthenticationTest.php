<?php

namespace Tests\Feature\PaymentFrequencies;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_payment_frequencies()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);

        $this->get(route('admin.payment_frequencies.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.payment_frequencies.show', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_payment_frequencies()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);

        $this->get(route('admin.payment_frequencies.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.payment_frequencies.store'), $payment_frequency->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);

        $this->get(route('admin.payment_frequencies.edit', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.payment_frequencies.update', $payment_frequency->id), $payment_frequency->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);

        $this->delete(route('admin.payment_frequencies.destroy', $payment_frequency->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
