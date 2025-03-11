<?php

namespace Modules\ServiceManagement\App\resources\Api\Dashboard;

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
            'icon' => $this->icon_path,
            'title' => $this->title,
            'text' => $this->text,
       ];
    }
}
