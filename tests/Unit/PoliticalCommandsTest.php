<?php

namespace Tests\Unit;

use App\Mail\CommandsBaseMail;
use App\Mail\Political\PoliticalFlashMail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class PoliticalCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_political_flash_report()
    {
        Mail::fake();

        $this->artisan('dainsys:political-send-hourly-flash')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_sends_the_hourly_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        $this->userWithRole('admin');

        $this->artisan('dainsys:political-send-hourly-production-report')
            ->expectsOutput('Political Hourly Production Report sent!')
            ->assertExitCode(0);

        Mail::assertSent(CommandsBaseMail::class);
    }
}
