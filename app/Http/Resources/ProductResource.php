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
            'id' => $this->id,
            'name' => $this->name,
            'price'=> $this->price,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'price_formatted' => number_format($this->price) . ' VND'
        ];
    }
}
