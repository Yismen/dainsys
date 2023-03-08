<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OvernightHourResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'date' => $this->date->format('Y-m-d'),
            'employee_id' => $this->employee_id,
            'name' => \optional($this->employee)->full_name,
            'hours' => $this->hours,
        ];
    }
}
