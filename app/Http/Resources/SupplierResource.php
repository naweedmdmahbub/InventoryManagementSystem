<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->first_name.' '.$this->last_name,
            'business_name' => $this->business_name,
            'contact_person' => $this->contact_person,
            'contact_no' => $this->contact_no,
            'email' => $this->email,
            'address' => $this->address,
            'website' => $this->website,
        ];
    }
}
