<?php

namespace Tests\Feature\RevenueTypes;

use App\RevenueType;
use App\RevenueTypeCode;
use App\Employee;
use App\Supervisor;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_revenue_types()
    {
        $user = $this->userWithPermission('view-revenue-types');
        $this->be($user);
        $revenue_type = create(RevenueType::class);

        $this->get(route('admin.revenue_types.index'))
            ->assertOk()
            ->assertViewIs('revenue_types.index');
    }

    /** @test */
    public function authorized_users_can_store_revenue_type()
    {
        $revenue_type = make(RevenueType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-revenue-types'))
            ->post(route('admin.revenue_types.store', $revenue_type))
            ->assertRedirect()
            ->assertLocation(route('admin.revenue_types.index'));

        $this->assertDatabaseHas('revenue_types', $revenue_type);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $revenue_type = create(RevenueType::class);

        $this->actingAs($this->userWithPermission('edit-revenue-types'))
            ->get(route('admin.revenue_types.edit', $revenue_type->id))
            ->assertOk()
            ->assertViewIs('revenue_types.edit');
    }

    /** @test */
    public function authorized_users_can_update_revenue_type()
    {
        $revenue_type = create(RevenueType::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-revenue-types'))
            ->put(route('admin.revenue_types.update', $revenue_type->id), array_merge($revenue_type->toArray(), $data_array))
            ->assertLocation(route('admin.revenue_types.index'));

        $this->assertDatabaseHas('revenue_types', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_revenue_type()
    {
        $revenue_type = create(RevenueType::class);

        $this->actingAs($this->userWithPermission('destroy-revenue-types'))
            ->delete(route('admin.revenue_types.destroy', $revenue_type->id))
            ->assertRedirect()
            ->assertLocation(route('admin.revenue_types.index'));

        $this->assertDatabaseMissing('revenue_types', $revenue_type->toArray());
    }
}
