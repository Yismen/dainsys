<?php

namespace App\Console\Commands\Inbound\Sheets;

class DispositionsByGate extends BaseDispositionsSheet
{
    protected $last_column = 'L';

    protected $freeze_pane_cell = 'A3';

    protected $auto_fit_column_start = 'B';

    protected $auto_fit_column_end = 'C';

    protected $avg_column_start = 'D';

    protected $avg_column_end = 'I';

    protected $total_calls_column = 'J';

    protected $total_sales_column = 'K';
}
