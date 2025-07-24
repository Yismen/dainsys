<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Process;
use App\Models\Project;
use App\Models\Site;
use App\Traits\Livewire\HasLivewireSearch;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class EmployeeProcess extends Component
{
    use HasLivewirePagination;
    use HasLivewireSearch;

    public int $process_id = 0;

    public int $site_id = 0;

    public int $department_id = 0;

    public int $project_id = 0;

    public int $position_id = 0;

    public function render()
    {
        return view('livewire.employee-process', [
            'employees_assigned' => $this->getEmployees(),
            'employees_not_assigned' => $this->getEmployeesNotAssigned(),
            'processes' => $this->processes(),
            'sites' => $this->sites(),
            'departments' => $this->departments(),
            'projects' => $this->projects(),
            'positions' => $this->positions(),
        ]);
    }

    public function assign(Employee $employee)
    {
        $employee->processes()->attach([$this->process_id]);
        Cache::flush();
    }

    public function unAssign(Employee $employee)
    {
        $employee->processes()->detach([$this->process_id]);
        Cache::flush();
    }

    public function assigAll()
    {
        $process = Process::find($this->process_id);

        $employees = $this->employeesQuery()
            ->when($this->process_id > 0, function ($query): void {
                $query->whereDoesntHave('processes', function ($query): void {
                    $query->where('processes.id', $this->process_id);
                });
            })
            ->when($this->search, function ($query): void {
                $query->where(function ($query): void {
                    $query->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('second_first_name', 'like', "%{$this->search}%")
                        ->orWhere('second_last_name', 'like', "%{$this->search}%");
                });
            })
            ->pluck('id');

        $process->employees()->attach($employees);
        Cache::flush();
    }

    protected function getEmployees()
    {
        if ($this->process_id === 0) {
            return null;
        }

        return $this->employeesQuery()
            ->when($this->process_id > 0, function ($query): void {
                $query->whereHas('processes', function ($query): void {
                    $query->where('processes.id', $this->process_id);
                });
            })
            ->paginate($this->amount, ['*'], 'assigned_page');
    }

    protected function getEmployeesNotAssigned()
    {
        if ($this->process_id === 0) {
            return null;
        }

        return $this->employeesQuery()
            ->when($this->process_id > 0, function ($query): void {
                $query->whereDoesntHave('processes', function ($query): void {
                    $query->where('processes.id', $this->process_id);
                });
            })
            ->paginate($this->amount, ['*'], 'not_assigned_page');
    }

    protected function employeesQuery()
    {
        return Employee::query()
            ->sorted()
            ->actives()
            ->with([
                'processes',
                'site',
                'position.department',
                'project',
            ])
            ->when($this->site_id > 0, function ($query): void {
                $query->whereHas('site', function ($site_query): void {
                    $site_query->where('id', $this->site_id);
                });
            })
            ->when($this->department_id > 0, function ($query): void {
                $query->whereHas('position.department', function ($query): void {
                    $query->where('id', $this->department_id);
                });
            })
            ->when($this->project_id > 0, function ($query): void {
                $query->whereHas('project', function ($query): void {
                    $query->where('id', $this->project_id);
                });
            })
            ->when($this->position_id > 0, function ($query): void {
                $query->whereHas('position', function ($query): void {
                    $query->where('id', $this->position_id);
                });
            })
            ->when(strlen((string) $this->search) > 0, function ($query): void {
                foreach (preg_split("/[\s,]+/", (string) $this->search, -1, PREG_SPLIT_NO_EMPTY) as $search_value) {
                    $query->where(function ($query) use ($search_value): void {
                        $query->where('first_name', 'like', "%{$search_value}%")
                            ->orWhere('last_name', 'like', "%{$search_value}%")
                            ->orWhere('second_first_name', 'like', "%{$search_value}%")
                            ->orWhere('second_last_name', 'like', "%{$search_value}%");
                    });
                }
            });
    }

    protected function processes()
    {
        return Cache::rememberForever('steps_processes', fn () => Process::orderBy('name')->get(['name', 'id']));
    }

    protected function sites()
    {
        return Cache::rememberForever('steps_sites', fn () => Site::query()
            ->orderBy('name')
            ->whereHas('employees', function ($query): void {
                $query->actives();
            })
            ->get(['name', 'id']));
    }

    protected function departments()
    {
        return Cache::rememberForever('steps_departments', fn () => Department::query()
            ->orderBy('name')
            ->whereHas('employees', function ($query): void {
                $query->actives();
            })
            ->get(['name', 'id']));
    }

    protected function projects()
    {
        return Cache::rememberForever('steps_projects', fn () => Project::query()
            ->orderBy('name')
            ->whereHas('employees', function ($query): void {
                $query->actives();
            })
            ->get(['name', 'id']));
    }

    protected function positions()
    {
        return Cache::rememberForever('steps_positions', fn () => Position::query()
            ->orderBy('name')
            ->whereHas('employees', function ($query): void {
                $query->actives();
            })
            ->get(['name', 'id']));
    }
}
