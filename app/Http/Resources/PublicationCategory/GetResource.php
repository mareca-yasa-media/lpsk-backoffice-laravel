<?php

namespace App\Http\Resources\PublicationCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'publications' => $this->publications,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
