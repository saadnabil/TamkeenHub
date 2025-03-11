<?php

namespace Modules\ProjectManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'type' => $this->type,
            'address' => $this->address,
            'deliveredStatus' => $this->delivered_status,
            'images' => ProjectImageResource::collection($this->images),
        ];
    }
}
