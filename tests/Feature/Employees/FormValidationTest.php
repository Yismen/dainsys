<?php

namespace Tests\Feature\Employees;

use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    /** @test */
    public function first_name_field_is_required()
    {
        $employee = create(Employee::class)->toArray();

        $this->actingAs($this->userWithPermission('create-employees'))
            ->post(route('admin.employees.store'), array_merge($employee, ['first_name' => '']))
            ->assertSessionHasErrors('first_name');

        $this->actingAs($this->userWithPermission('edit-employees'))
            ->put(route('admin.employees.update', $employee['id']), array_merge($employee, ['first_name' => '']))
            ->assertSessionHasErrors('first_name');
    }
}
