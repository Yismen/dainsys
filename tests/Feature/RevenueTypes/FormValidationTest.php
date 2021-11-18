<?php

namespace Tests\Feature\RevenueTypes;

use App\RevenueType;
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
        // $this->withoutExceptionHandling();
        $revenue_type = create(RevenueType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-revenue-types'))
            ->post(route('admin.revenue_types.store'), array_merge($revenue_type, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-revenue-types'))
            ->put(route('admin.revenue_types.update', $revenue_type['id']), array_merge($revenue_type, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
