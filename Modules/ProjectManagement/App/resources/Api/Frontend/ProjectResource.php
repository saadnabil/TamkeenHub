<?php

namespace Modules\ProjectManagement\App\resources\Api\Frontend;

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
            'title' => $this->titleTranslated,
            'text' => $this->textTranslated,
            'type' => $this->type,
            'address' => $this->addressTranslated,
            'deliveredStatus' => $this->delivered_status,
            'images' => ProjectImageResource::collection($this->images),
        ];
    }
}
