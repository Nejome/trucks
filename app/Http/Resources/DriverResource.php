<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'truck_plate' => $this->truck_plate,
            'truck_plate_image' => asset('uploads/drivers/trucks_plates/'.$this->truck_plate_image),
            'identification' => $this->identification,
            'identification_image' => asset('uploads/drivers/identifications/'.$this->identification_image),
            'balance' => $this->balance,
            'status' => $this->status,
            'current_lat' => $this->current_lat,
            'current_lng' => $this->current_lng,
            'available' => $this->available,
        ];
    }
}
