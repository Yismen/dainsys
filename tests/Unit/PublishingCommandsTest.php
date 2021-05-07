<?php

namespace Tests\Unit;

use App\Mail\CommandsBaseMail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class PublishingCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_hourly_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        $this->userWithRole('admin');

        $this->artisan('dainsys:publishing-send-hourly-production-report')
            ->expectsOutput('Publishing Hourly Production Report sent!')
            ->assertExitCode(0);

        Mail::assertSent(CommandsBaseMail::class);
    }
}
