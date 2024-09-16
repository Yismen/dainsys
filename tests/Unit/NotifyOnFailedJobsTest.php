<?php

namespace Tests\Unit;

use Exception;
use Tests\TestCase;
use App\Models\User;
use App\Models\Performance;
use Illuminate\Queue\Events\JobFailed;
use App\Jobs\UpdateBillableHoursAndRevenue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QueueFailingNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        event(new JobFailed('test', $job, new Exception()));

        Notification::assertSentTo($user, QueueFailingNotification::class);
        Notification::assertNotSentTo($regularUser, QueueFailingNotification::class);
    }
}
