<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function guests_can_not_visit_any_arss_route()
    {
        $ars = create('App\Models\Ars');
        $this->get(route('admin.arss.index'))->assertRedirect('/login');
        $this->get(route('admin.arss.show', $ars->id))->assertRedirect('/login');
        $this->get(route('admin.arss.create'))->assertRedirect('/login');
        $this->post(route('admin.arss.store', $ars->toArray()))->assertRedirect('/login');
        $this->get(route('admin.arss.edit', $ars->id))->assertRedirect('/login');
        $this->put(route('admin.arss.update', $ars->id))->assertRedirect('/login');
        $this->delete(route('admin.arss.destroy', $ars->id))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_arss_permissions_to_view_all_arss()
    {
        $this->actingAs(create('App\Models\User'));

        $response = $this->get('/admin/arss');

        $response->assertStatus(403);
    }

    /** @test */
    public function it_requires_view_arss_permissions_to_view_a_ars_details()
    {
        // given
        $ars = create('App\Models\Ars');
        $this->actingAs(create('App\Models\User'));

        // when
        $response = $this->get("/admin/arss/{$ars->id}");

        // assert
        $response->assertStatus(403);
    }

    /** @test */
    public function it_allows_users_to_view_arss_if_they_have_view_arss_permission()
    {
        // given
        $user = $this->userWithPermission('view-arss');
        $ars = create('App\Models\Ars');

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/arss');

        // assert
        $response->assertSee($ars->name);
    }

    /** @test */
    public function it_allows_users_to_view_a_ars_if_they_have_view_arss_permission()
    {
        // given
        $user = $this->userWithPermission('view-arss');
        $ars = create('App\Models\Ars');

        // when
        $this->actingAs($user);
        $response = $this->get(route('admin.arss.show', $ars->id));

        // assert
        $response->assertSee($ars->name);
    }

    /** @test */
    public function it_requires_create_arss_permission_to_add_a_permission()
    {
        // Given
        $user = create('App\Models\User');
        $this->actingAs($user);

        // When
        $response = $this->get(route('admin.arss.create'));
        // Expect

        $response->assertStatus(403);
    }

    /** @test */
    public function it_allows_with_create_arss_permission_to_create_arss()
    {
        // given
        $user = $this->userWithPermission('create-arss');

        // when
        $this->actingAs($user);
        $response = $this->get(route('admin.arss.create'));

        // assert
        $response->assertStatus(200);
    }

    /** @test */
    public function it_requires_destroy_arss_permission_to_destroy_a_permission()
    {
        // Given
        $this->actingAs(create('App\Models\User'));
        $ars = create('App\Models\Ars');

        // When
        $response = $this->delete(route('admin.arss.destroy', $ars->id));

        // Expect

        $response->assertStatus(403);
    }

    /** @test */
    public function it_allows_users_with_destroy_arss_permission_to_destroy_arss()
    {
        // given
        $user = $this->userWithPermission('destroy-arss');
        $ars = create('App\Models\Ars');

        // when
        $this->actingAs($user);
        $response = $this->delete(route('admin.arss.destroy', $ars->id));

        // assert
        $response->assertRedirect(route('admin.arss.index'));
        $this->assertDatabaseMissing('arss', ['id' => $ars->id]);
    }

    /** @test */
    public function it_requires_a_name_to_create_a_ars()
    {
        $this->actingAs($this->userWithPermission('create-arss'))
            ->post(route('admin.arss.store'), $this->formAttributes(['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_user_can_create_a_ars()
    {
        $ars = make('App\Models\Ars');

        $this->actingAs($this->userWithPermission('create-arss'))
            ->post(route('admin.arss.store', $ars->toArray()));

        $this->assertDatabaseHas('arss', ['name' => $ars->name]);

        $employee = make('App\Models\Employee');
        $employee->ars()->associate($ars);
        $employee->save();
        $this->get(route('admin.arss.index'))
            ->assertSee($ars->name);
    }

    /** @test */
    public function a_user_can_see_a_form_to_update_a_ars()
    {
        $this->actingAs($this->userWithPermission('edit-arss'));
        $ars = create('App\Models\Ars');

        $employee = create('App\Models\Employee');
        $employee->ars()->associate($ars);
        $employee->save();

        $this->get(route('admin.arss.edit', $ars->id))
            ->assertSee('Edit ARS - ' . $ars->name);
    }

    /** @test */
    public function it_requires_a_name_to_update_a_ars()
    {
        $ars = create('App\Models\Ars');

        $this->actingAs($this->userWithPermission('edit-arss'))
            ->put(route('admin.arss.update', $ars->id), $this->formAttributes(['name' => '']))
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_user_can_update_a_ars()
    {
        $ars = create('App\Models\Ars');
        $ars->name = 'New Name';

        $this->actingAs($this->userWithPermission('edit-arss'))
            ->put(route('admin.arss.update', $ars->id), $ars->toArray());

        $this->assertDatabaseHas('arss', ['name' => 'New Name']);

        $this->get(route('admin.arss.index'))
            ->assertSee('New Name');
    }
}
