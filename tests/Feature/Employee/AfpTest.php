<?php

namespace Tests\Feature\Employee;

use App\Afp;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class AfpTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_afp_is_assigned()
    {
        $this->withoutExceptionHandling();
        $employee = create(Employee::class);
        $afp = create(Afp::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-afp', $employee->id), ['afp_id' => $afp->id]);

        $response->assertOk();
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'afp_id' => $afp->id,
        ]);
    }

    /** @test */
    public function employee_afp_data_is_validated()
    {
        $afp = create(Afp::class);
        $employee = create(Employee::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-afp', $employee->id), ['afp_id' => '']);

        $response->assertRedirect()
            ->assertInvalid(['afp_id']);
    }
}
