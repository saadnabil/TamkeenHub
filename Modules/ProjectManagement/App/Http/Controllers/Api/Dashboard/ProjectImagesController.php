<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;

use Modules\ProjectManagement\App\Models\ProjectImage;

class ProjectImagesController extends Controller
{
    use ApiResponseTrait;
    
   
    /**destroy method */
    public function destroy(ProjectImage $projectImage){
        /**destroy image */
        FileHelper::delete_file($projectImage->image);

        $projectImage->delete();
        return $this->sendResponse([]);
    }
}
