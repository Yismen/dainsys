<?php

namespace Tests\Feature\Sites;

use App\Site;
use App\Employee;
use App\User;
use Carbon\Carbon;
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
        $site = create(Site::class)->toArray();

        $this->actingAs($this->userWithPermission('create-sites'))
            ->post(route('admin.sites.store'), array_merge($site, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-sites'))
            ->put(route('admin.sites.update', $site['id']), array_merge($site, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
