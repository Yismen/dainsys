<?php

namespace Tests\Unit;

use App\Jobs\UpdateBillableHoursAndRevenue;
use App\Models\Performance;
use App\Notifications\QueueFailingNotification;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class NotifyOnFailedJobsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_notification_when_jobs_fail()
    {
        Notification::fake();

        $regularUser = $this->user();
        $user = $this->userWithRole('admin');
        $job = new UpdateBillableHoursAndRevenue(Performance::all());

        event(new JobFailed('test', $job, new Exception));

        Notification::assertSentTo($user, QueueFailingNotification::class);
        Notification::assertNotSentTo($regularUser, QueueFailingNotification::class);
    }
}
