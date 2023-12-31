<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankDetailsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'agency' => $this->agency,
            'account' => $this->account,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),
            'pixes' => PixResource::collection($this->whenLoaded('pix'))
        ];
    }
}
