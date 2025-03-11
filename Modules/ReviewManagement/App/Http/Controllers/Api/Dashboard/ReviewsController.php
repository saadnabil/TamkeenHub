<?php

namespace Modules\ReviewManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ReviewManagement\App\Http\Requests\Api\Dashboard\ReviewRequestValidation;
use Modules\ReviewManagement\App\Models\Review;
use Modules\ReviewManagement\App\resources\Api\Dashboard\ReviewResource;

class ReviewsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $rows = Review::get();
        return $this->sendResponse(ReviewResource::collection($rows));
    }

    /**store method */
    public function store(ReviewRequestValidation $request)
    {
        $data = $request->validated();
        $data['image'] = FileHelper::upload_file('uploads',  $data['image']);
        Review::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(ReviewRequestValidation $request, Review $review)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('uploads',$data['image'], $review->image);
        };
       $review->update($data);
       return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Review $review){
        /**destroy icon */
        FileHelper::delete_file($review->image);
        /**destroy service */
        $review->delete();
        return $this->sendResponse([]);
    }
}
