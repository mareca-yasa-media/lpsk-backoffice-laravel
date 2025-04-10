<?php

namespace App\Http\Resources\ProfileCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetAllResource extends JsonResource
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
            'profiles' => $this->profiles,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
