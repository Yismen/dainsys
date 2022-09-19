<?php

namespace App\ModelFilters;

class PerformanceFilter extends BaseModelFilter
{
    public function campaign($request)
    {
        return $this->filterQuery($request, 'campaign');
    }

    public function source($request)
    {
        return $this->filterQuery($request, 'campaign.source');
    }

    public function employee($request)
    {
        return $this->where('name', $request);
        // return $this->filterQuery($request, 'employee');
    }

    public function supervisor($request)
    {
        return $this->filterQuery($request, 'supervisor');
    }

    public function supervisorEmployee($request)
    {
        return $this->filterQuery($request, 'employee.supervisor');
    }

    public function projectCampaign($request)
    {
        return $this->filterQuery($request, 'campaign.project');
    }

    public function projectEmployee($request)
    {
        return $this->filterQuery($request, 'employee.project');
    }

    public function site($request)
    {
        return $this->filterQuery($request, 'employee.site');
    }

    public function client($request)
    {
        return $this->filterQuery($request, 'campaign.project.client');
    }

    public function date($request)
    {
        return $this->whereDate('date', now()->parse($request)->format('Y-m-d'));
    }

    public function datesBetween($request)
    {
        $dates = explode(',', $request);

        $from_date = $dates[0];
        $to_date = trim($dates[1] ?? $dates[0]);

        return $this
            ->where(function ($query) use ($from_date, $to_date) {
                $query
                    ->whereDate('date', '>=', now()->parse($from_date)->format('Y-m-d'))
                    ->whereDate('date', '<=', now()->parse($to_date)->format('Y-m-d'));
            });
    }

    // public function department($request)
    // {
    //     return $this->filterQuery($request, 'employee.position.department');
    // }

    // public function position($request)
    // {
    //     return $this->filterQuery($request, 'employee.position');
    // }
}
