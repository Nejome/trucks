<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class TruckResource extends JsonResource
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
            'category' => new CategoryResource($this->category),
            'title' => $this->title,
            'max_weight' => $this->max_weight,
            'start_price' => $this->start_price,
            'km_price' => $this->km_price,
            'factory' => $this->factory,
            'icon' => asset('uploads/trucks/'.$this->icon),
        ];
    }
}
