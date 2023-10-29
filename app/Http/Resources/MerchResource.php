<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Merch */
class MerchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'imageSrc' => $this->image_src,
            'imageAlt' => $this->image_alt,
            'colors' => new MerchColorCollection($this->whenLoaded('merchColor')),
            'sizes' => new MerchSizeCollection($this->whenLoaded('merchSize')),
        ];
    }
}
