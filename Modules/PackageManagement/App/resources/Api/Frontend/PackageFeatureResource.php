<?php

namespace Modules\PackageManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->titleTranslated,
            'checkedStatus' => $this->checked_status,
        ];
    }
}
