<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

use App\Mail\CommandsBaseMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

trait HourlyProductionReportTrait
{
    /**
     * Message to be printed once report is sent
     */
    public string $report_message;
    /**
     * Repository interface
     */
    protected HourlyProductionReportInterface $repo;
    /**
     * Campaign name prefix
     */
    protected string $campaign_name_prefix;
    /**
     * String date representation
     */
    protected string $date_from;
    /**
     * String date to representation
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this
                ->bootOptionVariables()
                ->createAndSendReport($this->mail_subject, $this->distro);

            if ($this->report_message) {
                $this->line($this->report_message);
            }
        } catch (\Throwable $th) {
            $this->notifyUsersAndLogError($th);

            $this->error('Something went wrong');
        }
    }

    /**
     * Creates and send the report
     *
     * @param string $mail_subject
     * @param array $distro
     * @return void
     */
    protected function createAndSendReport(string $mail_subject, array $distro): void
    {
        $file_name = $mail_subject . ' ' . now()->format('Ymd_His') . '.xlsx';

        $this->repo = new HourlyProductionReportRepository(
            $this->date_from,
            $this->date_to,
            $this->campaign_name_prefix,
            $team = 'ECC%'
        );

        $this->repo
            ->getData()
            ->getDispositions();

        if (count($this->repo->data) > 0) {
            Excel::store(
                new HourlyProductionReportExport(
                    $this->repo,
                    $this->client,
                    $this->getDataView(),
                    $this->getDispositionsView()
                ),
                $file_name
            );

            Mail::send(
                new CommandsBaseMail($distro, $file_name, $mail_subject)
            );

            $this->report_message = "{$mail_subject} sent!";
        } else {
            $this->report_message = 'No data for this date. Nothing sent';
        }
    }

    /**
     * Get the distribution list from the config and explode it into an array
     *
     * @return array
     */
    protected function getDistroList(): array
    {
        $list = config($this->distro_config_path) ??
            abort(404, 'Invalid distro list. Set it up in the .env, separated by pipe (|).');

        return explode('|', $list);
    }

    /**
     * Initialize dates and other variables which can't be initialized from the constructor
     *
     * @return object
     */
    protected function bootOptionVariables(): object
    {
        $this->date_to = $this->option('date') == 'default' ?
            now()->format('m/d/Y') :
            Carbon::parse($this->option('date'))->format('m/d/Y');

        $this->date_from = $this->option('from') == 'default' ?
            $this->date_to :
            Carbon::parse($this->option('from'))->format('m/d/Y');

        return $this;
    }

    protected function getDataView()
    {
        return 'exports.data';
    }

    protected function getDispositionsView()
    {
        return 'exports.dispositions';
    }
}
