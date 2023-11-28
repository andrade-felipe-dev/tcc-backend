<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchingResource extends JsonResource
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
            'entity' => UserResource::make($this->whenLoaded('matchesAsEntity')),
            'voluntary' => UserResource::make($this->whenLoaded('matchesAsVoluntary'))
        ];
    }
}
