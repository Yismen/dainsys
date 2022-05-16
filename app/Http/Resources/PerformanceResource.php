<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerformanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unique_id' => $this->unique_id,
            'away_time' => $this->away_time,
            'billable_hours' => $this->billable_hours,
            'break_time' => $this->break_time,
            'calls' => $this->calls,
            'campaign_sph_goal' => $this->sph_goal, // here we return the goal at the moment of creation, no the current goal optional($this->campaign)->sph_goal
            'campaign' => optional($this->campaign)->name,
            'cc_sales' => $this->cc_sales,
            'client' => optional(optional(optional($this->campaign)->project)->client)->name,
            'contacts' => $this->contacts,
            'date' => $this->date,
            'department' => optional(optional($this->employee->position)->department)->name,
            'dontime_reason' => optional($this->downtimeReason)->name,
            'employee_id' => $this->employee_id,
            'employee_name' => optional($this->employee)->full_name,
            'first_name' => optional($this->employee)->first_name,
            'hire_date' => optional($this->employee)->hire_date->format('Y-m-d'),
            'last_name' => optional($this->employee)->last_name,
            'login_time' => $this->login_time,
            'lunch_time' => $this->lunch_time,
            'off_hook_time' => $this->off_hook_time,
            'pending_dispo_time' => $this->pending_dispo_time,
            'production_time' => $this->production_time,
            'project_employee' => optional($this->employee->project)->name,
            'project_performance' => optional(optional($this->campaign)->project)->name,
            'punch_id' => optional(optional($this->employee)->punch)->punch,
            'reported_by' => $this->reported_by,
            'revenue' => $this->revenue,
            'salary' => optional(optional($this->employee)->position)->salary,
            'sales' => $this->transactions,
            'second_first_name' => optional($this->employee)->second_first_name,
            'second_last_name' => optional($this->employee)->second_last_name,
            'site' => optional($this->employee->site)->name,
            'source' => optional(optional($this->campaign)->source)->name,
            'status' => $this->employee->status,
            'supervisor_employee' => optional($this->employee->supervisor)->name,
            'supervisor_performance' => optional($this->supervisor)->name,
            'talk_time' => $this->talk_time,
            'training_time' => $this->training_time,
            'upsales' => $this->upsales,
        ];
    }
}
