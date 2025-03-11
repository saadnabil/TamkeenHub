<?php

namespace Modules\PackageManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageFeaturesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'checkedStatus' => $this->checked_status,
        ];
    }
}
