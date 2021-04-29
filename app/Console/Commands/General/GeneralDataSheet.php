<?php

namespace App\Console\Commands\General;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class GeneralDataSheet implements FromView, WithTitle
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.data-ring-central', [
            'data' => $this->data,
        ]);
    }

    public function title(): string
    {
        return 'Ring Central Report';
    }
}
