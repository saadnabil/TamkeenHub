<?php

namespace Modules\StaticPages\App\resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StaticPagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {

            return[
                'name' => $this->name,
                'title' => $this->title_translated,
                'text' => $this->text_translated,
                'image' => $this->image_path,
            ];

    }
}
