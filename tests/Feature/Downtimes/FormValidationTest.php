<?php

namespace Tests\Feature\Downtimes;

use App\Models\Downtime;
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
        $downtime = create(Downtime::class)->toArray();

        $this->actingAs($this->userWithPermission('create-downtimes'))
            ->post(route('admin.downtimes.store'), array_merge($downtime, ['employee_id' => '']))
            ->assertSessionHasErrors('employee_id');

        $this->actingAs($this->userWithPermission('edit-downtimes'))
            ->put(route('admin.downtimes.update', $downtime['id']), array_merge($downtime, ['employee_id' => '']))
            ->assertSessionHasErrors('employee_id');
    }
}
