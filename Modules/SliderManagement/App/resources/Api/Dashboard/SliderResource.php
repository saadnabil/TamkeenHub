<?php

namespace Modules\SliderManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'background' => $this->background_path,
            'title' => $this->title,
            'text' => $this->text,
            'btnTitle' => $this->btn_title,
            'btnUrl' => $this->btn_url,
            'btnActive' => $this->btn_active,
       ];
    }
}
