<?php

namespace Modules\ServiceManagement\App\resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
            return[
                'id' => $this->id,
                'title' => $this->title_translated,
                'text' => $this->text_translated,
                'icon' => $this->icon_path,
            ];

    }
}
