<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $date = now();

        $schedule->command(\Dainsys\Commands\ClearLogs\ClearLogsCommand::class, [
            '--clear',
            '--keep=3'
        ])->dailyAt('02:00');

        $schedule->command(\App\Console\Commands\ClearTempraryFiles::class, [
            'remove_files_older_than_days' => 5
        ])->dailyAt('20:45');

        $schedule->command(\App\Console\Commands\EmployeesHired::class, ['--months' => 2, '--site' => 'santiago-hq'])->weeklyOn(2, '15:58');
        $schedule->command(\App\Console\Commands\EmployeesHired::class, ['--months' => 2, '--site' => 'santiago-hq'])->weeklyOn(5, '15:58');
        $schedule->command(\App\Console\Commands\EmployeesTerminated::class, ['--months' => 2,  '--site' => 'santiago-hq'])->weeklyOn(2, '15:59');
        $schedule->command(\App\Console\Commands\EmployeesTerminated::class, ['--months' => 2,  '--site' => 'santiago-hq'])->weeklyOn(5, '15:59');

        $schedule->command(\App\Console\Commands\General\SendGeneralDailyProductionReportCommand::class, ['--team' => 'ECC'])->dailyAt('05:25');
        $schedule->command(\App\Console\Commands\General\SendGeneralDailyRawReportCommand::class, ['--team' => 'ECC'])->dailyAt('05:45');

        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Publishing\SendPublishingProductionReportCommand::class)->hourlyAt(59);

        $schedule->command(\App\Console\Commands\Political\SendPoliticalFlashReportCommand::class)->hourly();
        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalProductionReportCommand::class)->hourlyAt(59);
        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalTextCampaignReportCommand::class)->dailyAt('07:20');

        $schedule->command(\App\Console\Commands\Inbound\SendDailySummaryCommand::class)->dailyAt('06:20');
        $schedule->command(\App\Console\Commands\Inbound\SendWTDSummaryCommand::class)->dailyAt('06:30');

        $schedule->command(\Spatie\Backup\Commands\BackupCommand::class)->dailyAt('21:15');
        $schedule->command(\Spatie\Backup\Commands\CleanupCommand::class)->dailyAt('22:15');

        $schedule->command(\App\Console\Commands\UpdateBillableHours::class, [
            '--days' => 1
        ])->dailyAt('01:15');
        $schedule->command(\Illuminate\Database\Console\PruneCommand::class, [
            '--model' => [
                \App\Models\Performance::class,
                \App\Models\UserLogin::class,
            ]
        ])->dailyAt('02:15');
        $schedule->command(\Laravel\Telescope\Console\PruneCommand::class, ['--hours' => 72])->dailyAt('06:40');
    }

    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'America/New_York';
    }
}
