<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
            'brand' => $this->brand,
            'model' => $this->model,
            'manufactured' => $this->manufactured,
            'year' => $this->year,
            'plate' => $this->plate,
            'mileage' => $this->mileage,
            'functioning' => $this->functioning,
            'esthetic' => $this->esthetic,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'image4' => $this->image4,
            'price' => number_format($this->price, 2) . 'Bs',
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }

    public function with($request)
    {
        return [
            'is_success' => true
        ];
    }
}
