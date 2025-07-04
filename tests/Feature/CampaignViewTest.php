<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampaignViewTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function guest_users_are_redirected()
    {
        $campaign = create(\App\Models\Campaign::class);

        $this->get(route('admin.campaigns.index'))->assertRedirect('/login');
        $this->get(route('admin.campaigns.show', $campaign->id))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_campaigns_permissions_to_view_all_campaigns()
    {
        $this->actingAs(create(\App\Models\User::class));

        $response = $this->get('/admin/campaigns');

        $response->assertStatus(403);
    }

    /** @test */
    public function it_requires_view_campaigns_permissions_to_view_a_campaign_details()
    {
        // given
        $campaign = create(\App\Models\Campaign::class);
        $this->actingAs(create(\App\Models\User::class));

        // when
        $response = $this->get("/admin/campaigns/{$campaign->id}");

        // assert
        $response->assertStatus(403);
    }

    /** @test */
    public function it_allows_users_to_view_campaigns_if_they_have_view_campaigns_permission()
    {
        // given
        $user = $this->userWithPermission('view-campaigns');
        $campaign = create(\App\Models\Campaign::class);

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/campaigns');

        // assert
        $response->assertSuccessful();
        // $response->assertSee($campaign->name);
    }

    /** @test */
    public function it_allows_users_to_view_a_campaign_if_they_have_view_campaigns_permission()
    {
        // given
        $user = $this->userWithPermission('view-campaigns');
        $campaign = create(\App\Models\Campaign::class);

        // when
        $this->actingAs($user);
        $response = $this->get(route('admin.campaigns.show', $campaign->id));

        // assert
        $response->assertSee($campaign->name);
    }
}
