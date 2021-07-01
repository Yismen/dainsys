<?php

namespace App\Console\Commands\Inbound\Sheets;

class ByEmployee extends BaseDispositionsSheet
{
    protected $last_column = 'M';

    protected $freeze_pane_cell = 'A3';
    protected $auto_fit_column_start = 'B';
    protected $auto_fit_column_end = 'D';
    protected $avg_column_start = 'E';
    protected $avg_column_end = 'J';
    protected $total_calls_column = 'K';
    protected $total_sales_column = 'L';
}
