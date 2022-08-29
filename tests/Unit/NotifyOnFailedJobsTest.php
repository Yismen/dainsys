<?php

namespace Tests\Unit;

use Exception;
use Tests\TestCase;
use App\Jobs\NotifyBirthdays;
use Illuminate\Queue\Events\JobFailed;
use App\Notifications\UserAppNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotifyOnFailedJobsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_notification_when_jobs_fail()
    {
        Notification::fake();

        $user = $this->userWithRole('admin');
        $job = new NotifyBirthdays();

        event(new JobFailed('test', $job, new Exception()));

        Notification::assertSentTo($user, UserAppNotification::class);
    }
}
