<?php

namespace Tests\Feature\PaymentTypes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.payment_types.index'))
            ->assertForbidden();

        $response->get(route('admin.payment_types.show', $payment_type->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.payment_types.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.payment_types.update', $payment_type->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_payment_type()
    {
        $payment_type = create(\App\Models\PaymentType::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.payment_types.destroy', $payment_type->id))
            ->assertForbidden();
    }
}
