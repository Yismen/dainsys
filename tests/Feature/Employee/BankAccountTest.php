<?php

namespace Tests\Feature\Employee;

use App\BankAccount;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankAccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_bank_account_is_created()
    {
        $employee = create(Employee::class);
        $bank_account = make(BankAccount::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-bank-account', $employee->id), $bank_account);

        $response->assertOk();
        $this->assertDatabaseHas('bank_accounts', array_merge($bank_account, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_bank_account_is_updated()
    {
        $bank_account = create(BankAccount::class);
        $updated_attributes = [
            'bank_id' => $bank_account->bank_id,
            'account_number' => 'Updated Info',
        ];

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-bank-account', $bank_account->employee->id), $updated_attributes);

        $response->assertOk();
        $this->assertDatabaseHas('bank_accounts', $updated_attributes);
    }

    /** @test */
    public function employee_bank_account_data_is_validated()
    {
        $bank_account = create(BankAccount::class);
        $updated_attributes = [
            'bank_id' => '',
            'account_number' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-bank-account', $bank_account->employee->id), $updated_attributes);

        $response->assertInvalid(['bank_id', 'account_number']);
    }
}
