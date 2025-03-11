<?php

namespace Modules\StaticPages\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class StaticPagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'name' => $this->name,
            'title' => $this->title,
            'text' => $this->text,
            'image' => $this->image_path,
        ];

    }
}
