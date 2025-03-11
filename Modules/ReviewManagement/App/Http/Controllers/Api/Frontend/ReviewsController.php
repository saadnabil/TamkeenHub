<?php

namespace Modules\ReviewManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ReviewManagement\App\Models\Review;
use Modules\ReviewManagement\App\resources\Api\Frontend\ReviewResource;

class ReviewsController extends Controller
{
    use ApiResponseTrait;

    public function list(){
        $rows = Review::latest()->get();
        return $this->sendResponse(ReviewResource::collection($rows));
   }

   public function show(Review $review){
      return $this->sendResponse(new ReviewResource($review));
   }
   
   
}
