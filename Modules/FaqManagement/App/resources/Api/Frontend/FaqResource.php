<?php

namespace Modules\FaqManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'question' => $this->questionTranslated,
            'answer' => $this->answerTranslated 
        ];
    }
}
