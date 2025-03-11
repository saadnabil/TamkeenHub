<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\resources\Api\Frontend\ProjectResource;

class ProjectsController extends Controller
{
   use ApiResponseTrait;
   public function list(){
        $rows = Project::with('images')->latest()->get();
        return $this->sendResponse(ProjectResource::collection($rows));
   }

   public function show(Project $project){
      $project->load('images');
      return $this->sendResponse(new ProjectResource($project));
   }
}
