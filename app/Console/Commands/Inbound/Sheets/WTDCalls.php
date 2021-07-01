<?php

namespace App\Console\Commands\Inbound\Sheets;

class WTDCalls extends BaseDispositionsSheet
{
    protected $last_column = 'K';

    protected $freeze_pane_cell = 'A3';
    protected $auto_fit_column_start = 'B';
    protected $auto_fit_column_end = 'B';
    protected $avg_column_start = 'C';
    protected $avg_column_end = 'H';
    protected $total_calls_column = 'I';
    protected $total_sales_column = 'J';
    protected $view = 'exports.inbound.wtd.wtd_calls';
}
