<?php

namespace Modules\SliderManagement\App\resources\Api;

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
            'title' => $this->title_translated,
            'text' => $this->text_translated,
            'btnTitle' => $this->btn_titleTranslated,
            'btnUrl' => $this->btn_url,
            'btnActive' => $this->btn_active,
        ];
    }
}
