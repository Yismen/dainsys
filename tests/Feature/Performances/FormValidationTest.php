<?php

namespace Tests\Feature\Performances;

use App\Performance;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function date_field_is_required()
    {
        $performance = create(Performance::class)->toArray();

        $this->actingAs($this->userWithPermission('edit-performances'))
            ->put(route('admin.performances.update', $performance['id']), array_merge($performance, ['date' => '']))
            ->assertSessionHasErrors('date');
    }
}
