<?php

namespace Tests\Feature\Employee;

use App\Address;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_address_is_created()
    {
        $employee = create(Employee::class);
        $address = make(Address::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-address', $employee->id), $address);

        $response->assertOk();
        $this->assertDatabaseHas('addresses', array_merge($address, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_address_is_updated()
    {
        $address = create(Address::class);
        $updated_attributes = [
            'sector' => 'Updated Info',
            'street_address' => 'Updated Info',
            'city' => 'Updated Info'
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-address', $address->employee->id), $updated_attributes);

        $response->assertOk();
        $this->assertDatabaseHas('addresses', $updated_attributes);
    }

    /** @test */
    public function employee_address_data_is_validated()
    {
        $address = create(Address::class);
        $updated_attributes = [
            'sector' => '',
            'street_address' => '',
            'city' => ''
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-address', $address->employee->id), $updated_attributes);

        $response->assertRedirect()
            ->assertInvalid(['sector', 'street_address', 'city']);
    }
}
