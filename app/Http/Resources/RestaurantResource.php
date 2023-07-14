<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => url("storage/{$this->image}"),
            'legal_name' => $this->legal_name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
