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
            'driver_id' => $this->driver_id,
            'customer' => new CustomerResource($this->customer),
            'truck' => new TruckResource($this->truck),
            'customer_phone' => $this->customer_phone,
            'shipment_type' => $this->shipment_type,
            'shipment_description' => $this->shipment_description,
            'shipment_weight' => $this->shipment_weight,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'price' => $this->price,
            'status' => $this->status,
        ];
    }
}
