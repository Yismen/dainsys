<?php

namespace Tests\Feature\PaymentTypes;

use App\Models\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_payment_types()
    {
        $user = $this->userWithPermission('view-payment_types');
        $this->be($user);
        $payment_type = create(PaymentType::class);

        $this->get(route('admin.payment_types.index'))
            ->assertOk()
            ->assertViewIs('payment_types.index');
    }

    /** @test */
    public function authorized_users_can_store_payment_type()
    {
        $payment_type = make(PaymentType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-payment_types'))
            ->post(route('admin.payment_types.store', $payment_type))
            ->assertRedirect()
            ->assertLocation(route('admin.payment_types.index'));

        $this->assertDatabaseHas('payment_types', $payment_type);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $payment_type = create(PaymentType::class);

        $this->actingAs($this->userWithPermission('edit-payment_types'))
            ->get(route('admin.payment_types.edit', $payment_type->id))
            ->assertOk()
            ->assertViewIs('payment_types.edit');
    }

    /** @test */
    public function authorized_users_can_update_payment_type()
    {
        $payment_type = create(PaymentType::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-payment_types'))
            ->put(route('admin.payment_types.update', $payment_type->id), array_merge($payment_type->toArray(), $data_array))
            ->assertLocation(route('admin.payment_types.show', $payment_type->id));

        $this->assertDatabaseHas('payment_types', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_payment_type()
    {
        $payment_type = create(PaymentType::class);

        $this->actingAs($this->userWithPermission('destroy-payment_types'))
            ->delete(route('admin.payment_types.destroy', $payment_type->id))
            ->assertRedirect()
            ->assertLocation(route('admin.payment_types.index'));

        $this->assertDatabaseMissing('payment_types', $payment_type->toArray());
    }
}
