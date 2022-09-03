<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdateBillableHoursAndRevenue as JobsUpdateBillableHoursAndRevenue;

class UpdateBillableHoursAndRevenue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:update-billable-hours-by-revenue-type
                            {--R|revenue_type= : string|optional. update for a specific revenue type. If not provided, all records will be updated.}
                            {--D|days= : int|optional. The amount of days to update the data. Default is 1 days old.}
                            {--C|campaign= : string|optional. The campaign you want apply.}'
    ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the billable hours performing a search by revenue type name';

    /**
     * Create a new command instance.
     *
     * @return void
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
        dispatch(
            new JobsUpdateBillableHoursAndRevenue($this->option('days'), $this->option('revenue_type'), $this->option('campaign'))
        );
    }
}
