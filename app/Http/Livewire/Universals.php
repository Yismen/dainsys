<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Project;
use App\Models\Site;
use App\Repositories\Employees\UniversalRepo;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Universals extends Component
{
    use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    public array $site_list = [1];

    public array $department_list = [];

    public array $project_list = [];

    public array $position_list = [];

    public $universals;
    public $noUniversals;

    public string $search = '';

    protected $listeners = [
        'confirmation_assign_all_universalsconfirmed' => 'assignAll',
        'confirmation_remove_all_universalsconfirmed' => 'unAssignAll',
    ];

    public function render()
    {
        $this->universals = $this->getEmployees('universals');
        $this->noUniversals = $this->getEmployees('noUniversals');

        return view('livewire.universals', [
            'sites' => Cache::rememberForever('universal_sites', function () {
                return Site::query()
                    ->whereHas('employees', function ($quer) {
                        $quer->actives();
                    })
                    ->orderBy('name')
                    ->get();
            }),
            'departments' => Cache::rememberForever('universal_departments', function () {
                return Department::query()
                    ->whereHas('employees', function ($quer) {
                        $quer->actives();
                    })
                    ->orderBy('name')
                    ->get();
            }),
            'projects' => Cache::rememberForever('universal_projects', function () {
                return Project::query()
                    ->whereHas('employees', function ($quer) {
                        $quer->actives();
                    })
                    ->orderBy('name')
                    ->get();
            }),
            'positions' => Cache::rememberForever('universal_positions', function () {
                return Position::query()
                    ->whereHas('employees', function ($quer) {
                        $quer->actives();
                    })
                    ->orderBy('name')
                    ->with('department', 'payment_type')
                    ->get();
            }),
        ]);
    }

    public function create(Employee $employee)
    {
        $employee->universal()->create(['since' => now()]);
    }

    public function remove(Employee $employee)
    {
        $employee->universal->delete();
    }

    public function paginationView()
    {
        return 'layouts.partials.pagination';
    }

    public function assignAll()
    {
        $this->noUniversals = $this->getEmployees('noUniversals');

        foreach ($this->noUniversals as $employee) {
            $employee->universal()->create(['since' => now()]);
        }
    }

    public function unAssignAll()
    {
        $this->universals = $this->getEmployees('universals');

        foreach ($this->universals as $employee) {
            $employee->universal->delete();
        }
    }

    public function updatingSearch(string $search)
    {
        $this->resetPage('universals');
        $this->resetPage('noUniversals');
    }

    protected function getEmployees(string $method)
    {
        $repo = new UniversalRepo();

        $employees = $repo->$method()
            ->with([
                'site',
                'project',
                'position' => function ($query) {
                    $query->with(['payment_type', 'department']);
                },
            ])
            ->when(count($this->site_list) > 0, function ($query) {
                $query->whereHas('site', function ($site_query) {
                    $site_query->whereIn('id', $this->site_list);
                });
            })
            ->when(count($this->department_list) > 0, function ($query) {
                $query->whereHas('position.department', function ($department_query) {
                    $department_query->whereIn('id', $this->department_list);
                });
            })
            ->when(count($this->project_list) > 0, function ($query) {
                $query->whereHas('project', function ($project_query) {
                    $project_query->whereIn('id', $this->project_list);
                });
            })
            ->when(count($this->position_list) > 0, function ($query) {
                $query->whereHas('position', function ($position_query) {
                    $position_query->whereIn('id', $this->position_list);
                });
            })
            ->when(strlen($this->search) > 0, function ($query) {
                foreach (preg_split("/[\s,]+/", $this->search, -1, PREG_SPLIT_NO_EMPTY) as $search_value) {
                    $query->where(function ($query) use ($search_value) {
                        $query->where('first_name', 'like', "%{$search_value}%")
                            ->orWhere('last_name', 'like', "%{$search_value}%")
                            ->orWhere('second_first_name', 'like', "%{$search_value}%")
                            ->orWhere('second_last_name', 'like', "%{$search_value}%");
                    });
                }
            })
            ->paginate(15, ['*'], $method);

        $this->$method = $employees;

        return $employees;
    }
}
