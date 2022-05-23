<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_photo_is_created()
    {
        $this->withoutExceptionHandling();
        $photo_array = ['photo' => UploadedFile::fake()->image('avatarForTesting.jpg', 200)];
        $employee = create(Employee::class);

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'photo' => '',
        ]);

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-photo', $employee->id), $photo_array);

        $response->assertOk();
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'photo' => "storage/images/employees/{$employee->id}.png",
        ]);
    }

    /** @test */
    public function employee_photo_data_is_validated()
    {
        $employee = create(Employee::class);
        $updated_attributes = [
            'photo' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-photo', $employee->id), $updated_attributes);

        $response->assertInvalid(['photo']);
    }
}
