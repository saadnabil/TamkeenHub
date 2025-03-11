<?php

namespace Modules\ClientManagement\App\resources\Api\Dashboard;

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
            'logo' => $this->logoPath,
        ];
    }
}
