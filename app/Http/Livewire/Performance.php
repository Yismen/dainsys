<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\HasLivewirePagination;
use App\Http\Livewire\Traits\WithSearch;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Campaign;
use App\Models\Performance as ModelsPerformance;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Performance extends Component
{
    use HasLivewirePagination;
    use WithSearch;
    use WithSorting;

    public $date;
    public $project;
    public $campaign;
    public $records = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.performance', [
            'performances' => $this->getPerformanceData(),
            'dates' => $this->getDates(),
            'projects' => $this->getProjects(),
            'campaigns' => $this->getCampaigns(),
        ]);
    }

    protected function getPerformanceData()
    {
        return ModelsPerformance::query()
            ->when($this->search, function ($query) {
                $terms = preg_split("/[\s]+/", $this->search, -1, PREG_SPLIT_NO_EMPTY);

                foreach ($terms as $value) {
                    // $query->whereDate('date', $value)
                    $query->whereHas('employee', function ($query) use ($value) {
                        $query->where('first_name', 'like', "{$value}%")
                            ->orWhere('second_first_name', 'like', "{$value}%")
                            ->orWhere('last_name', 'like', "{$value}%")
                            ->orWhere('second_last_name', 'like', "{$value}%");
                    })
                    ;
                }
            })
            ->when($this->date, function ($query) {
                $query->whereDate('date', $this->date);
            })
            ->when($this->project, function ($query) {
                $query->whereHas('campaign.project', function ($query) {
                    $query->where('id', $this->project);
                });
            })
            ->when($this->campaign, function ($query) {
                $query->whereHas('campaign', function ($query) {
                    $query->where('id', $this->campaign);
                });
            })
            ->with(
                [
                    'campaign.project',
                    'supervisor',
                    'employee.termination',
                ]
            )
            ->select([
                'id',
                'date',
                'employee_id',
                'campaign_id',
                'supervisor_id',
                'login_time',
                'production_time',
                'transactions',
                'revenue',
            ])
            ->orderBy('date', 'DESC')
            ->paginate($this->records);
    }

    protected function getDates()
    {
        return ModelsPerformance::query()
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->whereDate('date', '>=', now()->subYears(2))
            ->pluck('date');
    }

    protected function getProjects()
    {
        return Cache::rememberForever('performances_projects', function () {
            return Project::query()
                ->orderBy('name')
                ->select(['name', 'id'])
                ->get();
        });
    }

    protected function getCampaigns()
    {
        return Cache::rememberForever('performances_campaigns', function () {
            return Campaign::query()
                ->orderBy('name')
                ->select(['name', 'id'])
                ->when($this->project, function ($query) {
                    $query->where('project_id', $this->project);
                })
                ->get();
        });
    }
}
