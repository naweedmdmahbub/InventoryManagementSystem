<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'payment_status' => $this->payment_status,
            'purchase_status' => $this->purchase_status,
            'total' => $this->total,
            'paid' => $this->paid,
            'due' => $this->due,
            'total_discount' => $this->total_discount,
            'discount_type' => $this->discount_type,
            'notes' => $this->notes,
            'created_by' => $this->created_by,
            'details' => OrderDetailResource::collection($this->whenLoaded('orderDetails')),
            // 'details' => OrderDetailResource::collection($this->orderDetails),
        ];
    }
}
