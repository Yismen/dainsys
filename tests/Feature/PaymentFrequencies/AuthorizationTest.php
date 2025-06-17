<?php

namespace Tests\Feature\PaymentFrequencies;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.payment_frequencies.index'))
            ->assertForbidden();

        $response->get(route('admin.payment_frequencies.show', $payment_frequency->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.payment_frequencies.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.payment_frequencies.update', $payment_frequency->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_payment_frequency()
    {
        $payment_frequency = create(\App\Models\PaymentFrequency::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.payment_frequencies.destroy', $payment_frequency->id))
            ->assertForbidden();
    }
}
