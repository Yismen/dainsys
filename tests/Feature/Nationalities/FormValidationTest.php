<?php

namespace Tests\Feature\Nationalities;

use App\Nationality;
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
        $nationality = create(Nationality::class)->toArray();

        $this->actingAs($this->userWithPermission('create-nationalities'))
            ->post(route('admin.nationalities.store'), array_merge($nationality, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-nationalities'))
            ->put(route('admin.nationalities.update', $nationality['id']), array_merge($nationality, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
