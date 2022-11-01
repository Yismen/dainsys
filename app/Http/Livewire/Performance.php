<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Campaign;
use App\Http\Livewire\Traits\WithSearch;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Performance as ModelsPerformance;
use App\Http\Livewire\Traits\HasLivewirePagination;

class Performance extends Component
{
    use HasLivewirePagination;
    use WithSearch;
    use WithSorting;

    public $date;
    public $project;
    public $campaign;

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
                    $query->where('first_name', 'like', "$value%")
                    ->orWhere('second_first_name', 'like', "$value%")
                    ->orWhere('last_name', 'like', "$value%")
                    ->orWhere('second_last_name', 'like', "$value%");
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
        ->paginate();
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
        return Project::query()
            ->orderBy('name')
            ->select(['name', 'id'])
            // ->take(10)
            ->get();
    }

    protected function getCampaigns()
    {
        return Campaign::query()
            ->orderBy('name')
            ->select(['name', 'id'])
            ->when($this->project, function ($query) {
                $query->where('project_id', $this->project);
            })
            // ->take(10)
            ->get();
    }
}
