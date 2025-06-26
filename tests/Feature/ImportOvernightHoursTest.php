<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ImportOvernightHoursTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** Authentication: Prevent access to unauthenticated users */
    public function test_guest_cant_access()
    {
        $this->get(route('admin.overnight_hours.index'))->assertRedirect('/login');
        $this->get(route('admin.overnight_hours.create'))->assertRedirect('/login');
    }

    /** Authorization: Prevent access to unauthorizated users */
    public function test_unuthorized_users_cant_access()
    {
        $hour = create(\App\Models\OvernightHour::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.overnight_hours.index'))
            ->assertForbidden();

        $response->post(route('admin.import_overnight_hours.store'))
            ->assertForbidden();
    }

    /** Authorization: Grant access to authorizated users to import */
    public function test_authorized_users_can_see_a_form_to_import_overnight_hours()
    {
        $response = $this->actingAs($this->userWithPermission('view-overnight-hours'));

        $response->get(route('admin.overnight_hours.index'))
            ->assertOk()
            ->assertViewIs('overnight-hours.index')
            ->assertSee('Create Overnight Hours Manually');
    }

    /** Validations: Validate fields to reate */
    public function test_validate_importing_overnight_hour()
    {
        $response = $this->actingAs($this->userWithPermission('import-overnight-hours'));

        // File field is required
        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => ''])
            ->assertSessionHasErrors('_file_');

        // File field must be a file
        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => 'Non File Field'])
            ->assertSessionHasErrors('_file_');

        // File field must be a file with extensions .xls|.xlsx
        $file = UploadedFile::fake()->create('document.pdf');
        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => $file])
            ->assertSessionHasErrors('_file_');

        // File field size must be less than 3MB (3000 KB)
        $file = UploadedFile::fake()->create('document.xls', 3800);
        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => $file])
            ->assertSessionHasErrors('_file_');

        // File name must start with 'import_overnight_hours_'
        $file = UploadedFile::fake()->create('wrong_file_name.xls', 500);
        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => $file])
            ->assertSessionHasErrors('_file_');
    }

    /** Import file with hours */
    public function test_authorized_users_can_import_overnight_hours_file()
    {
        Excel::fake();

        $response = $this->actingAs($this->userWithPermission('import-overnight-hours'));

        // User Can upload a valid file
        $file = UploadedFile::fake()->create('import_overnight_hours_.xls', 1500);

        $response->post(route('admin.import_overnight_hours.store'), ['_file_' => $file])
            ->assertRedirect(route('admin.overnight_hours.index'));

        Excel::assertImported('import_overnight_hours_.xls');
    }
}
