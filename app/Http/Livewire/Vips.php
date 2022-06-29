<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Employees\VipRepo;

class Vips extends Component
{
    use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    public array $site_list = [1];

    public string $search = '';

    public function render()
    {
        return view('livewire.vips', [
            'vip_employees' => $this->getEmployees('vips'),
            'non_vip_employees' => $this->getEmployees('noVips'),
            'sites' => Cache::rememberForever('sites', function () {
                return Site::query()
                    ->orderBy('name')
                    ->get();
            })
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
        $repo = new VipRepo();

        return $repo->$method()
        ->with('site', 'position.payment_type', 'project')
        ->when(count($this->site_list) > 0, function ($query) {
            $query->whereHas('site', function ($site_query) {
                $site_query->whereIn('id', $this->site_list);
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
    }

    public function paginationView()
    {
        return 'layouts.partials.pagination';
    }
}
