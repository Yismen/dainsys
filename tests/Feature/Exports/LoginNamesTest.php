<?php

namespace Tests\Feature\Exports;

use App\LoginName;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class LoginNamesTest extends TestCase
{
    use RefreshDatabase;

    /** Authentication Tests */

    /** @test */
    public function guests_can_not_download_login_names()
    {
        factory(LoginName::class)->create();

        $this->get(route('admin.login_names.to-excel.all'))
            ->assertRedirect('login');
    }

    /** @test */
    public function guests_can_not_download_employees_login_names()
    {
        factory(LoginName::class)->create();

        $this->get(route('admin.login_names.to-excel.all-employees'))
            ->assertRedirect('login');
    }

    /** Authorization Tests */

    /** @test */
    public function users_without_permission_can_not_download_login_names()
    {
        factory(LoginName::class)->create();
        $this->actingAs($this->user());

        $this->get(route('admin.login_names.to-excel.all'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_permission_can_not_download_employees_login_names()
    {
        factory(LoginName::class)->create();
        $this->actingAs($this->user());

        $this->get(route('admin.login_names.to-excel.all-employees'))
            ->assertForbidden();
    }

    /** Actions tests */

    /** @test */
    public function it_download_all_login_names()
    {
        Excel::fake();
        $this->actingAs($this->userWithPermission('export-login-names-to-excel'));
        factory(LoginName::class)->create();

        $this->get(route('admin.login_names.to-excel.all'))
            ->assertOk();

        Excel::assertDownloaded('login-names.xlsx');
    }

    /** @test */
    public function it_download_all_employees_login_names()
    {
        Excel::fake();
        factory(LoginName::class)->create();
        $this->actingAs($this->userWithPermission('export-login-names-to-excel'));

        $this->get(route('admin.login_names.to-excel.all-employees'));

        Excel::assertDownloaded('login-names.xlsx');
    }
}
