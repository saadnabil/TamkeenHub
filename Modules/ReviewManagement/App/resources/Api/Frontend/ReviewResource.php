<?php

namespace Modules\ReviewManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'text' => $this->textTranslated,
            'image' => $this->imagePath,
        ];
    }
}
