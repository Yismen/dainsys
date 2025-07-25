<?php

namespace Tests\Feature\PaymentTypes;

use App\Models\PaymentType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $payment_type = create(PaymentType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-payment_types'))
            ->post(route('admin.payment_types.store'), array_merge($payment_type, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-payment_types'))
            ->put(route('admin.payment_types.update', $payment_type['id']), array_merge($payment_type, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
