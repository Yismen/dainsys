<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Report;
use Livewire\Component;

class ReportsForm extends Component
{
    use HasLivewirePagination;

    public array $fields = [
        'name' => null,
        'key' => null,
        'active' => true,
        'description' => null,
    ];

    public bool $is_editing = false;

    public Report $report;

    protected $listeners = ['wantsCreateReport', 'wantsEditReport'];

    protected $rules = [
        'fields.name' => 'required|min:3|unique:reports,name',
        'fields.key' => 'required|min:3|unique:reports,key',
        'fields.active' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.reports-form');
    }

    public function wantsCreateReport()
    {
        $this->reset(['fields', 'is_editing']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('showReportModal');
    }

    public function wantsEditReport(Report $report)
    {
        $this->report = $report;
        $this->is_editing = true;
        $this->fields['name'] = $report->name;
        $this->fields['key'] = $report->key;
        $this->fields['active'] = $report->active;
        $this->fields['description'] = $report->description;
        $this->resetValidation();
        $this->dispatchBrowserEvent('showReportModal');
    }

    public function store(Report $report)
    {
        $this->validate([
            'fields.name' => 'required|min:3|unique:reports,name',
            'fields.key' => 'required|min:3|unique:reports,key',
            // 'fields.title' => 'min:3',
        ]);

        $report->create($this->fields);

        $this->emit('reportSaved');
        $this->dispatchBrowserEvent('hideReportModal');
    }

    public function update()
    {
        $rules = array_merge($this->rules, [
            'fields.name' => 'required|min:3|unique:reports,name,'.$this->report->id,
            'fields.key' => 'required|unique:reports,key,'.$this->report->id,
        ]);
        $this->validate($rules);
        $this->report->update($this->fields);

        $this->emit('reportSaved');
        $this->dispatchBrowserEvent('hideReportModal');
    }
}
