<?php

namespace Modules\ClientManagement\App\resources\Api;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image_path,
        ];
    }
}
