<?php

namespace Modules\SettingManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class ListSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->title_translated,
            'address' => $this->address_translated,
            'phones' => $this->phones,
            'social_media' => $this->social_media,
            'long' => $this->long,
            'lat' => $this->lat,
            'email' => $this->email
        ];
    }
}
