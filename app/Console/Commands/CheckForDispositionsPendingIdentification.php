<?php

namespace App\Console\Commands;

use App\Mail\DispositionsNeedingIdentificationMail;
use App\Services\RingCentral\DispositionsPendingIdentificationService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckForDispositionsPendingIdentification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:check-for-dispositions-pending-identification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if there is any disposition needing to be identify and send email to system admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(DispositionsPendingIdentificationService $service)
    {
        $records = $service->query()
            ->get();

        $amount_of_records = $records->count();

        if ($records->count() > 0) {
            Mail::send(
                new DispositionsNeedingIdentificationMail(
                    $records,
                    $amount_of_records
                )
            );
        }

        $this->info(
            "There are {$amount_of_records} dispositions pending identification. An email has been sent to the system admin."
        );
    }
}
