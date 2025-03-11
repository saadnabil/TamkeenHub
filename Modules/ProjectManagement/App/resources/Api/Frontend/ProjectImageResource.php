<?php
namespace Modules\ProjectManagement\App\resources\Api\Frontend;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectImageResource extends JsonResource
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
