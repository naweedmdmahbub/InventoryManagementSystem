<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManpowerResource extends JsonResource
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
            'id' => $this->id,
            'date' => $this->date,
            'project_id' => $this->project->id,
            'supplier_id' => $this->supplier->id,
            'project_name' => $this->project->name,
            'supplier_name' => $this->supplier->first_name.' '.$this->supplier->last_name,
            'workers' => $this->workers,
            'created_by' => $this->created_by,
            // 'details' => OrderDetailResource::collection($this->orderDetails),
        ];
    }
}
