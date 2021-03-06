<?php

namespace App\Console\Commands\Capillus;

use App\Exports\Capillus\CapillusPerformanceExport;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\Capillus\CapillusDailyPerformanceMail;
use Illuminate\Support\Facades\Mail;

class SendDailyPerformanceReportCommand extends Command
{
    use CapillusCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:capillus-send-daily-performance-report {--date=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Capillus - send daily performance report';

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
        try {
            $instance = Carbon::now()->format('Ymd_His');
            $file_name = "Capillus Daily Performance Report {$instance}.xlsx";

            $date = $this->option('date') == 'default' ?
                Carbon::now()->subDay() :
                Carbon::parse($this->option('date'));

            Excel::store(new CapillusPerformanceExport($date), $file_name);

            Mail::send(
                new CapillusDailyPerformanceMail($this->distroList(), $file_name, "KNYC.E Daily Performance Report")
            );
    
            $this->info("Capillus Daily Performance sent!");
        } catch (\Throwable $th) {
            $this->notifyUsersAndLogError($th);
            $this->error("Something went wrong");
        }
    }
}
