<?php

namespace Tests\Feature\Punches;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function authorized_users_can_see_punch_list()
    {
        $punch = create('App\Models\Punch')->toArray();
        $response = $this->actingAs($this->userWithPermission('view-punches'));

        $response->get(route('admin.punches.index'))
            ->assertOk()
            ->assertViewIs('punches.index');
    }

    /** @test */
    public function authorized_users_can_create_a_punch()
    {
        $response = $this->actingAs($this->userWithPermission('create-punches'));
        $punch = make('App\Models\Punch')->toArray();

        $response->post(route('admin.punches.store'), $punch)
            ->assertRedirect(route('admin.punches.index'));

        $this->assertDatabaseHas('punches', [
            'punch' => $punch['punch'],
            'employee_id' => $punch['employee_id'],
        ]);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $punch = create('App\Models\Punch');
        $response = $this->actingAs($this->userWithPermission('edit-punches'));
        
        $response->get(route('admin.punches.edit', $punch->punch))
            ->assertOk()
            ->assertViewIs('punches.edit')
            ->assertSee("Edit Punch {$punch->punch},")
            ->assertSee('Punch ID:')
            ->assertSee($punch->punch)
            ->assertSee('Employee:')
            ->assertSee($punch->employee->full_name);
    }

    /** @test */
    public function authorized_users_can_update_punch()
    {
        $punch = create('App\Models\Punch');
        $updated = [
            'punch' => '00499',
            'employee_id' => create(Employee::class)->id,
        ];

        $response = $this->actingAs($this->userWithPermission('edit-punches'));

        $response->put(route('admin.punches.update', $punch->punch), $updated)
            ->assertRedirect(route('admin.punches.index'));

        $this->assertDatabaseMissing('punches', [
            'punch' => $punch->punch,
            'employee_id' => $punch->employee_id,
        ]);

        $this->assertDatabaseHas('punches', $updated);
    }

    /** @test */
    public function authorized_users_can_destroy_punch()
    {
        $punch = create('App\Models\Punch');
        $response = $this->actingAs($this->userWithPermission('destroy-punches'));

        $response->delete(route('admin.punches.destroy', $punch->punch))
            ->assertRedirect(route('admin.punches.index'));

        $this->assertDatabaseMissing('punches', [
            'punch' => $punch->punch,
        ]);
    }
}
