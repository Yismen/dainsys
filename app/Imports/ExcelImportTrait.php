<?php

namespace App\Imports;

use App\Notifications\UserAppNotification;
use Carbon\Carbon;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\ImportFailed;

trait ExcelImportTrait
{
    /**
     * The size of file chunks
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 500;
    }

    /**
     * The size of batches to insert.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 500;
    }

    /**
     * Events listeners for the Importer.
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterImport::class => function (AfterImport $event) {
                $this->importedBy->notify(new UserAppNotification(
                    'Data Imported Succesfully!',
                    "File {$this->file_name} was imported!",
                    'success'
                ));
            },
            ImportFailed::class => function (ImportFailed $event) {
                $this->importedBy->notify(new UserAppNotification(
                    'Import Failed!***',
                    $event->e->getMessage(),
                    'danger'
                ));
            },
        ];
    }

    /**
     * Convert an date in a carbon instance.
     *
     * @param value  $value  the value to be parsed
     * @param format $format the format from where the carbon instance is created
     *
     * @return Carbon instance
     */
    protected function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(
                \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)
            );
        } catch (\ErrorException $e) {
            return Carbon::parse($value);
        }
    }
}
