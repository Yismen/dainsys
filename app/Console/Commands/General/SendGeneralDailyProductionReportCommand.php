<?php

namespace App\Console\Commands\General;

use App\Console\Commands\General\DailyProductionReport\GeneralDailyProductionReportExport;
use App\Console\Commands\General\DailyProductionReport\GeneralDailyProductionReportRepository;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use App\Mail\CommandsBaseMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SendGeneralDailyProductionReportCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:general-rc-production-report {--date=} {--from=} {--team=ECC}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily Production report to General distro';
    /**
     * Initial range date
     */
    protected string $date_from;
    /**
     * Ending range date
     */
    protected string $date_to;
    /**
     * List of emails to send the report
     */
    protected array $distro;
    /**
     * Report subject name
     */
    protected string $mail_subject;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mail_subject = "General Daily Production Report";

        $this->file_name = $this->mail_subject . now()->subDay()->format('Ymd_His') . ".xlsx";

        $this->distro = $this->getDistroList();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->init();

            $results = (new GeneralDailyProductionReportRepository(
                [
                    'date_from' => $this->date_from,
                    'date_to' => $this->date_to
                ],
                $team = "{$this->option('team')}%"
            ));

            if (count($results->data) > 0) {
                Excel::store(
                    new GeneralDailyProductionReportExport(
                        $results
                    ),
                    $this->file_name
                );

                Mail::send(
                    new CommandsBaseMail($this->distro, $this->file_name, $this->mail_subject)
                );

                $this->line("{$this->mail_subject} Sent!");
            } else {
                $this->warn('No data for this date. Nothing sent');
            }
        } catch (\Throwable $th) {
            $this->error("Something went wrong");

            Log::debug($th);

            $this->notifyUsersAndLogError($th);
        }
    }
    /**
     * Get the list of emails to receive the report
     *
     * @return array
     */
    protected function getDistroList(): array
    {
        $list = config('dainsys.workforce.distro') ??
            abort(404, "Invalid distro list. Set it up in the .env, separated by pipe (|).");

        return explode("|", $list);
    }
    /**
     * Initiate command variables
     *
     * @return void
     */
    protected function init()
    {
        $this->date_to = !$this->option('date') ?
            now()->subDay()->format('m/d/Y') :
            Carbon::parse($this->option('date'))->format('m/d/Y');


        $this->date_from =  !$this->option('from') ?
            $this->date_to :
            Carbon::parse($this->option('from'))->format('m/d/Y');

        return $this;
    }
}
