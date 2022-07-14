<?php

namespace App\Http\Livewire;

use App\Models\Step;
use App\Models\Process;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Cache;

class EmployeeStep extends Component
{
    public int $employee_id;
    public int $process_id;

    protected $listeners = [
        'stepconfirmed' => 'remove'
    ];

    public function mount(int $employee_id, int $process_id)
    {
        $this->employee_id = $employee_id;
        $this->process_id = $process_id;
    }

    public function render()
    {
        $employee = Employee::query()
            ->where('id', $this->employee_id)
            ->with(['steps'])
            ->whereHas('processes', function ($query) {
                $query->where('processes.id', $this->process_id);
            })
            ->firstOrFail();

        $process = Process::find($this->process_id)->load(['steps']);

        return view('livewire.employee-step', [
            'employee_steps' => $employee->steps->pluck('id')->toArray(),
            'employee' => $employee,
            'process' => $process,
            'progress' => number_format($employee->processProgress($process->id))
            // 'progress' => $this->process->steps->count() === 0 ? 0 : number_format($this->employee->steps->count() / $this->process->steps->count() * 100)
        ]);
    }

    public function complete(Step $step)
    {
        $employee = Employee::query()
            ->where('id', $this->employee_id)
            ->whereHas('processes', function ($query) {
                $query->where('processes.id', $this->process_id);
            })
            ->firstOrFail();

        $employee->steps()->attach($step->id);
        Cache::flush();
    }

    public function remove(Step $step)
    {
        Employee::find($this->employee_id)->steps()->detach($step->id);
        Cache::flush();
    }
}
