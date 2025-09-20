<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->getRouteKey(),
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'image'       => $this->image ? url($this->image) : null,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id'   => $this->category->getRouteKey(),
                    'name' => $this->category->name,
                ];
            }),
            'brand' => $this->whenLoaded('brand', function () {
                return [
                    'id'   => $this->brand->getRouteKey(),
                    'name' => $this->brand->name,
                    'logo' => $this->brand->logo ? url($this->brand->logo) : null,
                ];
            }),
            'created_at'  => $this->created_at->toDateTimeString(),
            'updated_at'  => $this->updated_at->toDateTimeString(),
        ];
    }
}
