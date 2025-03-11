<?php

namespace Modules\TeamManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'image' => $this->imagePath,
        ];
    }
}
