<?php

namespace Tests\Feature\Api\V2;

use Tests\TestCase;
use App\Notification;
use Illuminate\Support\Arr;
use Laravel\Passport\Passport;
use Tests\Notifications\TestingNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_unread_notifications_only()
    {
        $user = $this->user();
        $unread_notifications = create(Notification::class, ['notifiable_id' => $user->id, 'read_at' => null], 3);
        $read_notifications = create(Notification::class, ['notifiable_id' => $user->id, 'read_at' => now()], 3);
        Passport::actingAs($user);

        $response = $this->get('/api/v2/notifications/unread');

        $response->assertJsonCount(3)
            ->assertJsonFragment(['foo' => json_decode($unread_notifications->first()->data)->foo])
            ->assertJsonMissing(['foo' => json_decode($read_notifications->first()->data)->foo]);
    }

    /** @test */
    public function it_limits_the_amount_of_unread_notifications_to_return()
    {
        $user = $this->user();
        $unread_notifications = create(Notification::class, ['notifiable_id' => $user->id, 'read_at' => null], 3);
        Passport::actingAs($user);

        $response = $this->get('/api/v2/notifications/unread?max_items=1');

        $response->assertJsonCount(1);
    }

    /** @test */
    public function it_marks_all_unread_notifications_as_read()
    {
        $user = $this->user();
        $unread_notification = create(Notification::class, ['notifiable_id' => $user->id, 'read_at' => null])->toArray();
        Passport::actingAs($user);

        $this->assertDatabaseHas(
            'notifications',
            array_merge(
                Arr::only($unread_notification, ['type', 'notifiable_type', 'notifiable_id']),
                ['read_at' => null]
            )
        );

        $response = $this->post('/api/v2/notifications/mark-all-as-read');

        $response->assertOk()
            ->assertJsonCount(0);

        $this->assertDatabaseMissing(
            'notifications',
            array_merge(
                Arr::only($unread_notification, ['type', 'notifiable_type', 'notifiable_id']),
                ['read_at' => null]
            )
        );
    }

    /** @test */
    public function it_limits_the_amount_of_notifications_marked_as_read()
    {
        $user = $this->user();
        $unread_notification = create(Notification::class, ['notifiable_id' => $user->id, 'read_at' => null], 3);
        Passport::actingAs($user);

        $response = $this->post('/api/v2/notifications/mark-all-as-read?max_items=2');

        $response->assertOk()
            ->assertJsonCount(1);

        $this->assertEquals(1, Notification::whereNull('read_at')->count());
        $this->assertEquals(2, Notification::whereNotNull('read_at')->count());
    }

    /** @test */
    public function it_returns_one_notification_and_mark_it_as_read()
    {
        $user = $this->user();
        $user->notify(new TestingNotification());

        Passport::actingAs($user);

        $notification = Notification::first();
        $this->assertEquals(1, Notification::whereNull('read_at')->count());

        $response = $this->get('/api/v2/notifications/show/' . $notification->id);

        $response->assertOk()
            ->assertJsonStructure([
                'type',
                'notifiable_type',
                'notifiable_id',
                'data',
            ]);
        $this->assertEquals(0, Notification::whereNull('read_at')->count());
    }
}
