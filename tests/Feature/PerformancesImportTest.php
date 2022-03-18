<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Performance;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformancesImportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_form_to_import_performances()
    {
        $this->actingAs($this->userWithPermission('view-performances-import'))
            ->get(route('admin.performances_import.index'))
            ->assertViewIs('performances_import.index')
            ->assertSee('Import Performances Data')
            ->assertSee('Imported Dates')
            ->assertSee('Import Data Form');
    }

    /** @test */
    public function it_validates_request_before_storing_a_file()
    {
        $attributes = [
            'excel_file' => '',
        ];
        $this->actingAs($this->userWithPermission('create-performances-import'));

        $response = $this->post(route('admin.performances_import.store'), $attributes);

        $response->assertInvalid('excel_file');
    }

    /** @test */
    public function it_checks_file_name_before_storing_a_file()
    {
        Storage::fake();

        $file = UploadedFile::fake()->create('wrong file name.csv', 8);
        $attributes = [
            'excel_file' => [$file],
        ];
        $this->actingAs($this->userWithPermission('create-performances-import'));

        $response = $this->post(route('admin.performances_import.store'), $attributes);

        $response->assertInvalid('excel_file');
    }

    /** @test */
    public function file_is_imported()
    {
        Storage::fake();
        Excel::fake();
        $correct_name_prefix = '_performance_daily_data';
        $file_name = $correct_name_prefix . '_anything.csv';
        $file = UploadedFile::fake()->create($file_name, 8);
        $attributes = [
            'excel_file' => [$file],
        ];
        $this->actingAs($this->userWithPermission('create-performances-import'));

        $this->post(route('admin.performances_import.store'), $attributes)
            ->assertRedirect(route('admin.performances_import.index'))
            ->assertSessionHas('imported_files', [
                0 => $file_name,
            ]);

        Excel::assertImported($file->getFilename());
    }

    /** @test */
    public function it_shows_delete_confirmation_form()
    {
        $this->actingAs($this->userWithPermission('destroy-performances-import'));

        $response = $this->get(route('admin.performances_import.confirm_destroy'))
            ->assertOk()
            ->assertViewIs('performances_import.confirm-destroy')
            ->assertViewHasAll(['date', 'file_name']);
    }

    /** @test */
    public function it_deletes_data_for_given_file_name_and_date()
    {
        $performance = factory(Performance::class)->create();
        $attributes = [
            'date' => $performance->date,
            'file_name' => $performance->file_name,
        ];

        $this->actingAs($this->userWithPermission('destroy-performances-import'));

        $response = $this->delete(route('admin.performances_import.destroy', 'rand'), $attributes);

        $response->assertJson(['status' => 'sucess', 'message' => 'Performances Deleted']);

        $this->assertDatabaseMissing('performances', $attributes);
    }

    /** @test */
    public function it_shows_all_performances_for_a_date()
    {
        $date_1 = factory(Performance::class)->create(['date' => '2021-01-01']);
        $date_2 = factory(Performance::class)->create(['date' => '2021-01-05']);

        $this->actingAs($this->userWithPermission('view-performances-import'));

        $response = $this->get(route('admin.performances_import.by_date', $date_1->date));

        $response->assertViewIs('performances_import.show')
            ->assertSee($date_1->date)
            ->assertDontSee($date_2->date);
    }
}
