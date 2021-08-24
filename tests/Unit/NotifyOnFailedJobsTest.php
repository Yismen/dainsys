<?php

namespace Tests\Unit;

use App\Jobs\ExampleJob;
use App\Jobs\NotifyBirthdays;
use App\Notifications\UserAppNotification;
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

        $user = $this->userWithRole('admin');
        $job = new NotifyBirthdays();

        event(new JobFailed('test', $job, new Exception()));

        Notification::assertSentTo($user, UserAppNotification::class);
    }
}
