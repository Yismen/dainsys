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
    protected $commands = [
        \App\Console\Commands\Political\SendPoliticalFlashReportCommand::class,
        \App\Console\Commands\Political\SendPoliticalHourlyProductionReportCommand::class,

        \App\Console\Commands\Publishing\SendPublishingHourlyProductionReportCommand::class,

        \App\Console\Commands\General\SendGeneralDailyProductionReportCommand::class,
        \App\Console\Commands\General\SendGeneralDailyRawReportCommand::class,

        // \App\Console\Commands\Wow\SendWowDailyReportCommand::class,

        \App\Console\Commands\EmployeesHired::class,
        \App\Console\Commands\EmployeesTerminated::class,
        \App\Console\Commands\FeedSchedulesTable::class,
        \App\Console\Commands\FeedShiftsTableCommand::class,
        \App\Console\Commands\MigrationStatus::class,
        \App\Console\Commands\UpdateSlugs::class,
        \App\Console\Commands\DainsysInit::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('telescope:prune --hours=24')->dailyAt('06:40')->timezone('America/New_York');

        $schedule->command('dainsys:laravel-logs laravel- --clear --keep=8')->dailyAt('04:00')->timezone('America/New_York');

        $schedule->command('dainsys:feed-shifts --hours=7.5 --saturday=1')->dailyAt('14:59')->timezone('America/New_York');
        $schedule->command('dainsys:feed-schedules --days=15 --since-days-ago=0')->dailyAt('15:10')
            ->timezone('America/New_York');

        $schedule->command('dainsys:employees-hired --months=1')->weeklyOn(2, '15:58')->timezone('America/New_York');
        $schedule->command('dainsys:employees-hired --months=1')->weeklyOn(5, '15:58')->timezone('America/New_York');
        $schedule->command('dainsys:employees-terminated --months=1')->weeklyOn(2, '15:59')->timezone('America/New_York');
        $schedule->command('dainsys:employees-terminated --months=1')->weeklyOn(5, '15:59')->timezone('America/New_York');


        $schedule->command('dainsys:general-rc-production-report --team=ECC')->dailyAt('05:25')->timezone('America/New_York');
        $schedule->command('dainsys:general-rc-raw-report --team=ECC')->dailyAt('05:45')->timezone('America/New_York');

        $schedule->command('dainsys:political-send-hourly-flash')->hourly()->timezone('America/New_York');
        $schedule->command('dainsys:political-send-hourly-production-report')->hourlyAt(59)->timezone('America/New_York');

        $schedule->command('dainsys:publishing-send-hourly-production-report')->hourlyAt(58)->timezone('America/New_York');

        $schedule->command('backup:run')->dailyAt('21:15')->timezone('America/New_York');
        $schedule->command('backup:clean')->dailyAt('22:15')->timezone('America/New_York');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
