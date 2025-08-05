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
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $date = now();

        /**
         * Employees
         * -------------------------------------------------------------------------------------------------------------
         */
        $schedule->command(\App\Console\Commands\EmployeesHired::class, [
            $date->copy()->subDay()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])->dailyAt('05:55'); // Daily for the previous day
        $schedule->command(\App\Console\Commands\EmployeesHired::class, [
            $date->copy()->subDay()->startOfWeek()->format('Y-m-d').','.$date->copy()->subDay()->endOfWeek()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])->weeklyOn(1, '05:56'); // Every monday for the previous week
        $schedule->command(\App\Console\Commands\EmployeesHired::class, [
            now()->subMonth()->startOfMonth()->format('Y-m-d').','.now()->subMonth()->endOfMonth()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])->monthlyOn(1, '05:57'); // Monthly for the previous month

        $schedule->command(\App\Console\Commands\EmployeesTerminated::class, [
            $date->copy()->subDay()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])->dailyAt('05:55'); // Daily for the previous day
        $schedule->command(\App\Console\Commands\EmployeesTerminated::class, [
            $date->copy()->subDay()->startOfWeek()->format('Y-m-d').','.$date->copy()->subDay()->endOfWeek()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])
            ->weeklyOn(1, '05:56'); // Every monday for the previous week
        $schedule->command(\App\Console\Commands\EmployeesTerminated::class, [
            now()->subMonth()->startOfMonth()->format('Y-m-d').','.now()->subMonth()->endOfMonth()->format('Y-m-d'),
            '--site' => 'santiago-hq',
        ])->monthlyOn(1, '05:57'); // Monthly for the previous month

        /**
         * Ring Central Commands
         * ---------------------------------------------------------------------------------
         */
        $schedule->command(\App\Console\Commands\General\SendGeneralDailyProductionReportCommand::class, ['--team' => 'ECC'])
            ->dailyAt('05:25');
        $schedule->command(\App\Console\Commands\General\SendGeneralDailyRawReportCommand::class, ['--team' => 'ECC'])
            ->dailyAt('05:45');

        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Publishing\SendPublishingProductionReportCommand::class)
            ->everyThirtyMinutes();

        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalFlashReportCommand::class)->hourly();
        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalProductionReportCommand::class)->hourly();
        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalTextCampaignReportCommand::class)->dailyAt('07:20');

        // Hotel Planner Reports
        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\HotelPlanning\SendHotelPlanningProductionReportCommand::class, ['--date' => now()
            ->format('Y-m-d')])
            ->everyThirtyMinutes();

        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\HotelPlanning\SendHotelPlanningProductionReportCommand::class, [
            '--date' => now()->subDay()->format('Y-m-d'),
            '--from_date' => now()->subDay()->startOfWeek()->format('Y-m-d'),
            '--subject' => 'WTD Hotel Planner Hours Report',
        ])->dailyAt('06:30');

        $schedule->command(\App\Console\Commands\RingCentralReports\Commands\HotelPlanning\SendHotelPlanningProductionReportCommand::class, [
            '--date' => now()->subDay()->format('Y-m-d'),
            '--from_date' => now()->subDay()->startOfMonth()->format('Y-m-d'),
            '--subject' => 'MTD Hotel Planner Hours Report',
        ])->lastDayOfMonth('06:40');

        $schedule->command(\App\Console\Commands\Inbound\SendDailySummaryCommand::class)->dailyAt('06:20');
        $schedule->command(\App\Console\Commands\Inbound\SendWTDSummaryCommand::class)->dailyAt('06:30');
        // check for dispositions
        $schedule->command(\App\Console\Commands\CheckForDispositionsPendingIdentification::class)->everyThreeHours();

        /**
         * Clean up commands
         * ----------------------------------------------------------------------
         */
        $schedule->command(\Dainsys\Commands\ClearLogs\ClearLogsCommand::class, [
            '--clear',
            '--keep=3',
        ])->dailyAt('02:00');

        $schedule->command(\App\Console\Commands\ClearTempraryFiles::class, [
            // 'remove_files_older_than_days' => 5
            5,
        ])->dailyAt('20:45');

        $schedule->command(\Spatie\Backup\Commands\BackupCommand::class)->dailyAt('21:15');
        $schedule->command(\Spatie\Backup\Commands\CleanupCommand::class)->dailyAt('22:15');

        $schedule
            ->command(\App\Console\Commands\UpdateBillableHoursAndRevenue::class, [
                now()->subDays(1)->format('Y-m-d').','.now()->format('Y-m-d'),
                'created_at',
            ])
            ->dailyAt('01:15');

        $schedule->command(\Illuminate\Database\Console\PruneCommand::class, [
            '--model' => [
                \App\Models\Performance::class,
                \App\Models\UserLogin::class,
                \App\Models\Notification::class,
            ],
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
