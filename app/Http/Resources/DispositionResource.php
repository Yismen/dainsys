<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DispositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'contacts' => $this->contacts,
            'sales' => $this->sales,
            'upsales' => $this->upsales,
            'cc_sales' => $this->cc_sales,
        ];
    }
}
