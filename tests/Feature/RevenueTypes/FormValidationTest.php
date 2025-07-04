<?php

namespace Tests\Feature\RevenueTypes;

use App\Models\RevenueType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $revenue_type = create(RevenueType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-revenue-types'))
            ->post(route('admin.revenue_types.store'), array_merge($revenue_type, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-revenue-types'))
            ->put(route('admin.revenue_types.update', $revenue_type['id']), array_merge($revenue_type, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
