<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\BillableHoursAndRevenueService;
use App\Jobs\UpdateBillableHoursAndRevenue as JobsUpdateBillableHoursAndRevenue;

class UpdateBillableHoursAndRevenue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:update-billable-hours-by-revenue-type
                            {dates : Default is yesterday\'s date. You can pass multiple dates divided by (,|). }
                            {--revenue_type= : string|optional. update for a specific revenue type. If not provided, all records of any type will be updated.}
                            {--campaign= : string|optional. The campaign you want apply.}
                            {--T|test : If activated, nothing will be changed, but records will be console logged.}
                            {--chunk_size=3000 : Amount of records per job.}'
    ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the billable hours performing a search by revenue type name';

    protected $serviceData;

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
        $this->serviceData = resolve(BillableHoursAndRevenueService::class, [
            'dates' => $this->argument('dates'),
            'revenue_type' => $this->option('revenue_type'),
            'campaign' => $this->option('campaign')
        ])->query();
        $count = $this->serviceData->count();

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        if ($this->option('test')) {
            $this->printTestTable();
        } else {
            $this->dispatchBatchedJobs($bar);
        }

        $bar->finish();

        $this->line('Total records: ' . $count);
    }

    protected function dispatchBatchedJobs($bar)
    {
        foreach ($this->serviceData->get()->chunk((int)$this->option('chunk_size')) as $chunk) {
            dispatch(
                new JobsUpdateBillableHoursAndRevenue($chunk)
            );

            $bar->advance();
        }
    }

    protected function printTestTable()
    {
        $records = $this->serviceData->take(50)->reorder()->inRandomOrder()->get()->map(function ($performance) {
            return [
                $performance->date,
                $performance->campaign->name,
                $performance->campaign->revenueType->name,
                $performance->login_time,
                $performance->production_time,
                $performance->talk_time,
                $performance->transactions,
                $performance->billable_hours,
                $performance->campaign->revenue_rate,
                $performance->revenue,

            ];
        });

        $this->table(
            ['Date', 'Campaign', 'Revenue Type', 'Login Hours', 'Work Hours', 'Talk Time', 'Sales', 'Billable Hours', 'Rate', 'Revenue'],
            $records->toArray()
        );
    }
}
