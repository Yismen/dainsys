<?php

namespace Tests\Feature\Departments;

use App\Models\Department;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $department = create(Department::class)->toArray();

        $this->actingAs($this->userWithPermission('create-departments'))
            ->post(route('admin.departments.store'), array_merge($department, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-departments'))
            ->put(route('admin.departments.update', $department['id']), array_merge($department, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
