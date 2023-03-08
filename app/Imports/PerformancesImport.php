<?php

namespace App\Imports;

use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;

class PerformancesImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithEvents, WithChunkReading, ShouldQueue, WithMapping
{
    use Importable;
    use ExcelImportTrait;
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;
    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * The name with the file will be saved.
     *
     * @var string
     */
    protected $file_name;
    /**
     * The user who imported the file.
     *
     * @var App\Models\User::class
     */
    protected $importedBy;

    /**
     * class constructor
     *
     * @param string $file_name
     */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;

        $this->importedBy = auth()->user();
    }

    public function map($performance): array
    {
        return [
            'away_time' => $performance['away_time_parsed'],
            'billable_hours' => $performance['billable_hours'],
            'break_time' => $performance['break_time_parsed'],
            'calls' => $performance['calls'],
            'campaign_id' => $performance['campaign_id'],
            'cc_sales' => $performance['cc_sales'],
            'contacts' => $performance['contacts'],
            'date' => Carbon::parse($performance['date'])->format('Y-m-d'),
            'employee_id' => $performance['employee_id'],
            'employee_name' => $performance['employee_name'],
            'file_name' => $this->file_name,
            'login_time' => $performance['login_time_parsed'],
            'lunch_time' => $performance['lunch_time_parsed'],
            'off_hook_time' => $performance['off_hook_time_parsed'],
            'pending_dispo_time' => $performance['pending_dispo_time_parsed'],
            'production_time' => $performance['production_time_parsed'],
            'reason_id' => $performance['reason_id'],
            'reported_by' => $performance['reported_by'],
            'revenue' => $performance['revenue'],
            'sph_goal' => $performance['sph_goal'],
            'supervisor_id' => $performance['supervisor_id'],
            'talk_time' => $performance['talk_time_parsed'],
            'training_time' => $performance['training_time_parsed'],
            'transactions' => $performance['transactions'],
            'unique_id' => $performance['unique_id'],
            'upsales' => $performance['upsales'],
        ];
    }

    /**
     * Use ToModel logic to save the data
     *
     * @param  array            $row
     *
     * @return \App\Performance instance
     */
    public function model(array $row)
    {
        Performance::query()
            ->where('unique_id', $row['unique_id'])
            ->orWhere(function ($performance_query) use ($row) {
                $performance_query
                    ->where('employee_id', $row['employee_id'])
                    ->where('campaign_id', $row['campaign_id'])
                    ->where('date', $row['date']);
            })
            ->delete();

        return new Performance($row);
    }

    /**
     * Validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.unique_id' => 'required',
            '*.date' => 'required|date',
            '*.employee_id' => 'required|exists:employees,id',
            // '*.employee_name' => 'required',
            '*.campaign_id' => 'required|exists:campaigns,id',
            '*.supervisor_id' => 'required|exists:supervisors,id',
            '*.sph_goal' => 'required|numeric',
            '*.login_time' => 'required|numeric',
            '*.production_time' => 'required|numeric',
            '*.talk_time' => 'numeric',
            '*.break_time' => 'numeric',
            '*.lunch_time' => 'numeric',
            '*.training_time' => 'numeric',
            '*.pending_dispo_time' => 'numeric',
            '*.off_hook_time' => 'numeric',
            '*.away_time' => 'numeric',
            '*.billable_hours' => 'required|numeric',
            '*.contacts' => 'required|numeric',
            '*.calls' => 'required|numeric',
            '*.transactions' => 'required|numeric',
            '*.upsales' => 'required|numeric',
            '*.cc_sales' => 'required|numeric',
            '*.revenue' => 'required|numeric',
            '*.downtime_reason_id' => 'nullable|exists:downtime_reasons,id',
        ];
    }
}
