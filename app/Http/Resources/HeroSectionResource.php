<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroSectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_heading'     => $this->first_heading,
            'secound_heading'   => $this->secound_heading,
            'third_heading'     => $this->third_heading,
            'description'       => $this->description,
            'background'        => $this->background_url
        ];
    }
}
