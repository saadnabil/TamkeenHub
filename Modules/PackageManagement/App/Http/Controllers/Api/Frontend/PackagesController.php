<?php

namespace Modules\PackageManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;

use Modules\PackageManagement\App\Models\Package;
use Modules\PackageManagement\App\resources\Api\Frontend\PackageResource;

class PackagesController extends Controller
{
    use ApiResponseTrait;
   public function list(){
        $rows = Package::with('features')->latest()->get();
        return $this->sendResponse(PackageResource::collection($rows));
   }

   public function show(Package $package){
      $package->load('features');
      return $this->sendResponse(new PackageResource($package));
   }
   
}
