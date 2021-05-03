<?php

namespace App\Console\Commands\General;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class GeneralDataSheet implements FromView, WithTitle
{
    protected $data;

    protected string $view_name;

    protected string $page_title;

    public function __construct(array $data, string $view_name = 'exports.data-ring-central', string $page_title = 'Ring Central Report')
    {
        $this->data = $data;
        $this->view_name = $view_name;
        $this->page_title = $page_title;
    }

    public function view(): View
    {
        return view($this->view_name, [
            'data' => $this->data,
        ]);
    }

    public function title(): string
    {
        return $this->page_title;
    }
}
