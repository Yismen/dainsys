<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Project;
use App\Models\Site;
use App\Repositories\Employees\VipRepo;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Vips extends Component
{
    use HasLivewirePagination;

    // protected $paginationTheme = 'bootstrap';

    public array $site_list = [1];

    public array $department_list = [];

    public array $project_list = [];

    public array $position_list = [];

    public string $search = '';

    public function render()
    {
        return view('livewire.vips', [
            'vip_employees' => $this->getEmployees('vips'),
            'non_vip_employees' => $this->getEmployees('noVips'),
            'sites' => Cache::rememberForever('vip_sites', fn () => Site::query()
                ->whereHas('employees', function ($quer): void {
                    $quer->actives();
                })
                ->orderBy('name')
                ->get()),
            'departments' => Cache::rememberForever('vip_departments', fn () => Department::query()
                ->whereHas('employees', function ($quer): void {
                    $quer->actives();
                })
                ->orderBy('name')
                ->get()),
            'projects' => Cache::rememberForever('vip_projects', fn () => Project::query()
                ->whereHas('employees', function ($quer): void {
                    $quer->actives();
                })
                ->orderBy('name')
                ->get()),
            'positions' => Cache::rememberForever('vip_positions', fn () => Position::query()
                ->whereHas('employees', function ($quer): void {
                    $quer->actives();
                })
                ->orderBy('name')
                ->with('department', 'payment_type')
                ->get()),
        ]);
    }

    public function create(Employee $employee)
    {
        $employee->vip()->create(['since' => now()]);
    }

    public function remove(Employee $employee)
    {
        $employee->vip->delete();
    }

    protected function getEmployees(string $method)
    {
        $repo = new VipRepo;

        return $repo->$method()
            ->with([
                'site',
                'project',
                'position' => function ($query): void {
                    $query->with(['payment_type', 'department']);
                },
            ])
            ->when(count($this->site_list) > 0, function ($query): void {
                $query->whereHas('site', function ($site_query): void {
                    $site_query->whereIn('id', $this->site_list);
                });
            })
            ->when(count($this->department_list) > 0, function ($query): void {
                $query->whereHas('position.department', function ($department_query): void {
                    $department_query->whereIn('id', $this->department_list);
                });
            })
            ->when(count($this->project_list) > 0, function ($query): void {
                $query->whereHas('project', function ($project_query): void {
                    $project_query->whereIn('id', $this->project_list);
                });
            })
            ->when(count($this->position_list) > 0, function ($query): void {
                $query->whereHas('position', function ($position_query): void {
                    $position_query->whereIn('id', $this->position_list);
                });
            })
            ->when(strlen($this->search) > 0, function ($query): void {
                foreach (preg_split("/[\s,]+/", $this->search, -1, PREG_SPLIT_NO_EMPTY) as $search_value) {
                    $query->where(function ($query) use ($search_value): void {
                        $query->where('first_name', 'like', "%{$search_value}%")
                            ->orWhere('last_name', 'like', "%{$search_value}%")
                            ->orWhere('second_first_name', 'like', "%{$search_value}%")
                            ->orWhere('second_last_name', 'like', "%{$search_value}%");
                    });
                }
            })
            ->paginate($this->amount, ['*'], $method);
    }
}
