<?php

namespace App\ModelFilters;

class PerformanceFilter extends BaseModelFilter
{
    public function campaign($request)
    {
        return $this->filterQuery($request, "campaign");
    }
    public function source($request)
    {
        return $this->filterQuery($request, "campaign.source");
    }

    public function employee($request)
    {
        return $this->filterQuery($request, "employee");
    }

    public function supervisor($request)
    {
        return $this->filterQuery($request, "supervisor");
    }

    public function supervisorEmployee($request)
    {
        return $this->filterQuery($request, "employee.supervisor");
    }

    public function projectCampaign($request)
    {
        return $this->filterQuery($request, "campaign.project");
    }

    public function projectEmployee($request)
    {
        return $this->filterQuery($request, "employee.project");
    }

    public function site($request)
    {
        return $this->filterQuery($request, "employee.site");
    }

    public function client($request)
    {
        return $this->filterQuery($request, "campaign.project.client");
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
