<?php

namespace App\Console;

use App\Performance;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Console\PruneCommand;
use Dainsys\Commands\ClearLogs\ClearLogsCommand;
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
        $schedule->command('telescope:prune --hours=72')->dailyAt('06:40');

        $schedule->command(PruneCommand::class, [
            '--model' => [Performance::class]
        ])->monthlyOn(15);

        $schedule->command(ClearLogsCommand::class, [
            '--clear',
            '--keep=3'
        ])->dailyAt('02:00');

        // $schedule->command('dainsys:feed-shifts --hours=7.5 --saturday=1')->dailyAt('14:59');
        // $schedule->command('dainsys:feed-schedules --days=15 --since-days-ago=0')->dailyAt('15:10');

        $schedule->command('dainsys:employees-hired --months=2 --site=santiago-hq')
            ->weeklyOn(2, '15:58');
        $schedule->command('dainsys:employees-hired --months=2 --site=santiago-hq')
            ->weeklyOn(5, '15:58');
        $schedule->command('dainsys:employees-terminated --months=2 --site=santiago-hq')
            ->weeklyOn(2, '15:59');
        $schedule->command('dainsys:employees-terminated --months=2 --site=santiago-hq')
            ->weeklyOn(5, '15:59');

        $schedule->command('dainsys:general-rc-production-report --team=ECC')->dailyAt('05:25');
        $schedule->command('dainsys:general-rc-raw-report --team=ECC')->dailyAt('05:45');

        $schedule->command('publishing:send-production-report')->hourlyAt(58);

        $schedule->command('dainsys:political-send-hourly-flash')->hourly();
        $schedule->command('political:send-production-report')->hourlyAt(59);
        $schedule->command('political:send-text-campaign-report')->dailyAt('07:20');

        $schedule->command('inbound:send-daily-summary')->dailyAt('06:20');
        $schedule->command('inbound:send-wtd-summary')->dailyAt('06:30');

        $schedule->command('dmr:send-hourly-report')->hourlyAt(59);
        // $schedule->command('ooma:send-production-report')->dailyAt('20:05');
        // $schedule->command('ooma:send-mtd-calls-report')->dailyAt('20:15');

        $schedule->command('backup:run')->dailyAt('21:15');
        $schedule->command('backup:clean')->dailyAt('22:15');
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
