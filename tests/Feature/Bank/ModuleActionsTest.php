<?php

namespace Tests\Feature\Banks;

use App\Bank;
use App\BankCode;
use App\Employee;
use App\Supervisor;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_banks()
    {
        $user = $this->userWithPermission('view-banks');
        $this->be($user);
        $bank = create(Bank::class);

        $this->get(route('admin.banks.index'))
            ->assertOk()
            ->assertViewIs('banks.index');
    }

    /** @test */
    // public function authorized_users_can_store_bank()
    // {
    //     $bank = make(Bank::class, ['date' => Carbon::now()])->toArray();
    //     $bank = array_merge($bank, ['employee_id' => [$bank['employee_id']]]);

    //     // $this->actingAs($this->userWithPermission('edit-banks'))
    //     //     ->post(route('admin.banks.store', $bank))
    //     //     ->assertRedirect()
    //     //     ->assertLocation(route('admin.banks.index'));

    //     $this->assertDatabaseHas('banks', [
    //         'employee_id' => $bank['employee_id'],
    //         // 'code_id' => $bank['code_id'],
    //         // 'user_id' => auth()->user()->id,
    //     ]);
    // }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $bank = create(Bank::class);

        $this->actingAs($this->userWithPermission('edit-banks'))
            ->get(route('admin.banks.edit', $bank->id))
            ->assertOk()
            ->assertViewIs('banks.edit');
    }

    /** @test */
    public function authorized_users_can_update_bank()
    {
        $bank = create(Bank::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-banks'))
            ->put(route('admin.banks.update', $bank->id), array_merge($bank->toArray(), $data_array))
            ->assertLocation(route('admin.banks.index'));

        $this->assertDatabaseHas('banks', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_bank()
    {

        $bank = create(Bank::class);

        $this->actingAs($this->userWithPermission('destroy-banks'))
            ->delete(route('admin.banks.destroy', $bank->id))
            ->assertRedirect()
            ->assertLocation(route('admin.banks.index'));

        $this->assertDatabaseMissing('banks', $bank->toArray());
    }
}
