<?php

namespace Tests\Feature\Nationalities;

use App\Models\Employee;
use App\Models\Nationality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssignEmployeesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authentication tests
     */

    /** @test */
    public function guests_can_not_assign_employees()
    {
        $this->post(route('admin.nationalities.assign-employees'))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function users_without_assign_nationalities_employee_permissions_cannot_assign_employees()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->post(route('admin.nationalities.assign-employees'))
            ->assertForbidden();
    }

    /**
     * Valiation tests
     */

    /** @test */
    public function it_validates_before_assigning_employees_to_a_nationality()
    {
        $nationality_1 = factory(Nationality::class)->create();
        $nationality_2 = factory(Nationality::class)->create();
        $employee = factory(Employee::class)->create(['nationality_id' => $nationality_1->id]);
        $this->actingAs($this->userWithPermission('assign-nationalities-employees'));

        $attributes = [
            'employee' => '',
            'nationality' => '',
        ];

        $this->post(route('admin.nationalities.assign-employees'), $attributes)
            ->assertSessionHasErrors(array_keys($attributes));
    }

    /**
     * Actions tests
     */

    /** @test */
    public function it_assign_employees_to_a_nationality()
    {
        $nationality_1 = factory(Nationality::class)->create();
        $nationality_2 = factory(Nationality::class)->create();
        $employee = factory(Employee::class)->create(['nationality_id' => $nationality_1->id]);
        $this->actingAs($this->userWithPermission('assign-nationalities-employees'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'nationality_id' => $nationality_1->id,
        ]);

        $this->post(route('admin.nationalities.assign-employees'), [
            'employee' => [$employee->id],
            'nationality' => $nationality_2->id,
        ])
            ->assertRedirect(route('admin.nationalities.index'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'nationality_id' => $nationality_2->id,
        ]);
    }
}
