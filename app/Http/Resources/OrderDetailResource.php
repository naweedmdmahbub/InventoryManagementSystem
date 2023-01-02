<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'order_id' => $this->order_id,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'total' => $this->total,
            // 'material_name' => $this->relationLoaded('material') ? $this->material->name : '',
            'material_name' => $this->material->name,
        ];
    }
}
