<?php

namespace Modules\PackageManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'annual' => [
                'priceAnnual' => $this->price_annual,
                'discountAnnual' => $this->discount_annual,
                'priceAnnualAfterDiscount' => round( $this->price_annual - ( $this->price_annual * $this->discount_annual ) / 100, 2),
            ],
            'monthly' => [
                'priceMonthly' => $this->price_monthly,
                'discountMonthly' => $this->discount_monthly,
                'priceMonthlyAfterDiscount' => round($this->price_monthly - ( $this->price_monthly * $this->discount_monthly ) / 100,2),
            ],
            'activeStatus' => $this->active_status,
            'borderedStatus' => $this->bordered_status,
            'features' => PackageFeaturesResource::collection($this->features)
        ];
    }
}
