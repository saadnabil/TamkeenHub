<?php

namespace Modules\FaqManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\FaqManagement\App\Models\Faq;
use Modules\FaqManagement\App\resources\Api\Frontend\FaqResource;

class FaqsController extends Controller
{
  use ApiResponseTrait;
  public function list(){
    $rows = Faq::latest()->get();
    return $this->sendResponse(FaqResource::collection($rows));
  }

  public function show(Faq $faq){
    return $this->sendResponse(new FaqResource($faq));
  }
}
