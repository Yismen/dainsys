<?php

namespace App\Console\Commands;

use App\Mail\EmployeesAfiliation;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

abstract class EmployeesAbstractCommand extends Command
{
    protected $dates;

    protected function parseDates(): array
    {
        $dates = $this->argument('dates');
        $dates = preg_split('/[\s,|]/', $dates, -1, PREG_SPLIT_NO_EMPTY);
        $dates['date_from'] = Carbon::parse($dates[0])->startOfDay();
        $dates['date_to'] = Carbon::parse($dates[1] ?? $dates[0])->endOfDay();

        return $dates;
    }

    protected function fileName(): string
    {
        return join('-', [
            str($this->name)->afterLast(':'),
            'from',
            $this->dates['date_from']->format('Y-m-d'),
            'to',
            $this->dates['date_to']->format('Y-m-d'),
        ]) . '.xlsx';
    }

    protected function getSubject(): string
    {
        return join(' ', [
            str($this->name)->afterLast(':')->headline(),
            'From',
            $this->dates['date_from']->format('Y-m-d'),
            'To',
            $this->dates['date_to']->format('Y-m-d'),
        ]);
    }

    protected function createAndSend($exporter): bool
    {
        $report = Report::query()->where('key', $this->name)->firstOrFail();
        $recipients = $report->mailableRecipients();

        $this->dates = $this->parseDates();
        $file_name = $this->fileName();
        $subject = $this->getSubject();

        $exporter = new $exporter($this->dates['date_from'], $this->dates['date_to'], $this->option('site'));

        if (! $exporter->hasData()) {
            return false;
        }

        $exporter->store($file_name);

        Mail::send(new EmployeesAfiliation($file_name, $subject, $recipients));

        return true;
    }
}
