<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Http\Livewire\EmployeeProcess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeProcessController extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_visit_any_employee_process_route()
    {
        $this->get(route('admin.employee-process.index'))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_employe_process_permissions_to_view_all_employee_process()
    {
        $this->actingAs(create('App\Models\User'));

        $response = $this->get('/admin/employee_process');

        $response->assertStatus(403);
    }

    /** @test */
    // public function it_requires_view_employee-process_permissions_to_view_a_step_details()
    // {
    //     // given
    //     $step = create('App\Models\Step');
    //     $this->actingAs(create('App\Models\User'));

    //     // when
    //     $response = $this->get("/admin/employee-process/{$step->id}");

    //     // assert
    //     $response->assertStatus(403);
    // }

    /** @test */
    public function it_allows_users_to_view_employee_process_if_they_have_view_employee_process_permission()
    {
        $this->withoutExceptionHandling();
        // given
        $user = $this->userWithPermission('view-employee-process');

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/employee_process');

        // assert
        // $response->assertSee($step->name);
        $response->assertSeeLivewire(EmployeeProcess::class);
    }

    /** @test */
    // public function it_allows_users_to_view_a_step_if_they_have_view_employee-process_permission()
    // {
    //     // given
    //     $user = $this->userWithPermission('view-employee-process');
    //     $step = create('App\Models\Step');

    //     // when
    //     $this->actingAs($user);
    //     $response = $this->get(route('admin.employee-process.show', $step->id));

    //     // assert
    //     $response->assertSee($step->name);
    // }
}
