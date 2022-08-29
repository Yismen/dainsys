<?php

namespace App\Console\Commands\General;

use Carbon\Carbon;
use App\Mail\CommandsBaseMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Console\Commands\Common\Traits\NotifyUsersOnFailedCommandsTrait;
use App\Console\Commands\General\DailyRawReport\GeneralDailyRawReportExport;
use App\Console\Commands\General\DailyRawReport\GeneralDailyRawReportRepository;

class SendGeneralDailyRawReportCommand extends Command
{
    use NotifyUsersOnFailedCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dainsys:general-rc-raw-report {--date=} {--from=} {--team=ECC}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily Raw report to General distro';
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

        $this->mail_subject = 'General Daily Raw Report';

        $this->file_name = $this->mail_subject . now()->subDay()->format('Ymd_His') . '.xlsx';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->distro = $this->getDistroList();
        try {
            $this->init();

            $results = (new GeneralDailyRawReportRepository(
                [
                    'date_from' => $this->date_from,
                    'date_to' => $this->date_to,
                ],
                $team = "{$this->option('team')}%"
            ));

            if ($results->data && count($results->data) > 0) {
                Excel::store(
                    new GeneralDailyRawReportExport(
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
            $this->error('Something went wrong');

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
        $service = new \App\Services\DainsysConfigService();

        return $service->getDistro($this->name);
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

        $this->date_from = !$this->option('from') ?
            $this->date_to :
            Carbon::parse($this->option('from'))->format('m/d/Y');

        return $this;
    }
}
