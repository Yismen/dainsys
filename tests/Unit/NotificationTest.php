<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Notification;
use Illuminate\Database\Console\PruneCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_removes_prunable_notifications()
    {
        $regular = Notification::factory()->create(['created_at' => now()]);
        $prunable = Notification::factory()->create(['created_at' => now()->subDays(15)]);

        $this->artisan(PruneCommand::class, [
            '--model' => [
                Notification::class
            ],
        ]);

        $this->assertDatabaseHas('notifications', ['data' => $regular->data]);
        $this->assertDatabaseMissing('notifications', ['data' => $prunable->data]);
    }
}
