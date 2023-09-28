<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'phones' => PhoneResource::collection($this->whenLoaded('phones')),
            'addresses' => AddressResource::collection($this->whenLoaded('addresses')),
            'advertisements' => AdvertisementResource::collection($this->whenLoaded('advertisements')),
        ];
    }

    public function with($request)
    {
        return [
            'is_success' => true
        ];
    }
}
