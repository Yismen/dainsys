<?php

namespace Tests\Feature\PaymentFrequencies;

use App\Models\PaymentFrequency;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_payment_frequencies()
    {
        $user = $this->userWithPermission('view-payment_frequencies');
        $this->be($user);
        $payment_frequency = create(PaymentFrequency::class);

        $this->get(route('admin.payment_frequencies.index'))
            ->assertOk()
            ->assertViewIs('payment_frequencies.index');
    }

    /** @test */
    public function authorized_users_can_store_payment_frequency()
    {
        $payment_frequency = make(PaymentFrequency::class)->toArray();

        $this->actingAs($this->userWithPermission('create-payment_frequencies'))
            ->post(route('admin.payment_frequencies.store', $payment_frequency))
            ->assertRedirect()
            ->assertLocation(route('admin.payment_frequencies.index'));

        $this->assertDatabaseHas('payment_frequencies', $payment_frequency);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $payment_frequency = create(PaymentFrequency::class);

        $this->actingAs($this->userWithPermission('edit-payment_frequencies'))
            ->get(route('admin.payment_frequencies.edit', $payment_frequency->id))
            ->assertOk()
            ->assertViewIs('payment_frequencies.edit');
    }

    /** @test */
    public function authorized_users_can_update_payment_frequency()
    {
        $payment_frequency = create(PaymentFrequency::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-payment_frequencies'))
            ->put(route('admin.payment_frequencies.update', $payment_frequency->id), array_merge($payment_frequency->toArray(), $data_array))
            ->assertLocation(route('admin.payment_frequencies.show', $payment_frequency->id));

        $this->assertDatabaseHas('payment_frequencies', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_payment_frequency()
    {
        $payment_frequency = create(PaymentFrequency::class);

        $this->actingAs($this->userWithPermission('destroy-payment_frequencies'))
            ->delete(route('admin.payment_frequencies.destroy', $payment_frequency->id))
            ->assertRedirect()
            ->assertLocation(route('admin.payment_frequencies.index'));

        $this->assertDatabaseMissing('payment_frequencies', $payment_frequency->toArray());
    }
}
