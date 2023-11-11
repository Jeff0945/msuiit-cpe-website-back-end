<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\MerchColor */
class MerchColorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'imageSrc' => $this->image_src,
            'imageAlt' => $this->image_alt,
            'color' => $this->color,
            'selectedColor' => $this->selected_color,
        ];
    }
}
