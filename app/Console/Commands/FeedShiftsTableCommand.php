<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class FeedShiftsTableCommand extends Command
{
    protected $hours;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:feed-shifts {--hours=7.5}{--saturday=0}{--sunday=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Feed the shifts table with all employees who does not have a shift';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $collection = Employee::actives()->whereDoesntHave('shift')->get();

        $bar = $this->output->createProgressBar($collection->count());
        $bar->start();

        foreach ($collection as $employee) {
            (new Shift)->create(
                [
                    'employee_id' => $employee->id,
                    'slug' => Str::slug($employee->fullName),
                    'start_at' => '07:00:00',
                    'end_at' => '16:00:00',
                    'monday' => $this->option('hours'),
                    'tuesday' => $this->option('hours'),
                    'wednesday' => $this->option('hours'),
                    'thursday' => $this->option('hours'),
                    'friday' => $this->option('hours'),
                    'saturday' => (bool) $this->option('saturday') === true ? $this->option('hours') : 0,
                    'sunday' => (bool) $this->option('sunday') === true ? $this->option('hours') : 0,
                ]
            );

            $bar->advance();
        }

        $bar->finish();

        return $this->info('done');
    }
}
