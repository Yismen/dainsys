<?php

namespace Tests\Feature\DowntimeReasons;

use App\Models\DowntimeReason;
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
        $downtime_reason = create(DowntimeReason::class)->toArray();

        $this->actingAs($this->userWithPermission('create-downtime_reasons'))
            ->post(route('admin.downtime_reasons.store'), array_merge($downtime_reason, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-downtime_reasons'))
            ->put(route('admin.downtime_reasons.update', $downtime_reason['id']), array_merge($downtime_reason, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
