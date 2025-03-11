<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ProjectManagement\App\Http\Requests\Api\Dashboard\ProjectRequestValidation;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\Models\ProjectImage;
use Modules\ProjectManagement\App\resources\Api\Dashboard\ProjectResource;

class ProjectsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $projects = Project::with('images')->get();
        return $this->sendResponse(ProjectResource::collection($projects));
    }

    /**store method */
    public function store(ProjectRequestValidation $request)
    {
        $data = $request->validated();
        $projectImages = $data['images'] ?? [];
        unset($data['images']);
        $project = Project::create($data);
        foreach ($projectImages as $image){
            $imageName = FileHelper::upload_file('uploads', $image);
            ProjectImage::create([
                'image' => $imageName,
                'project_id' => $project->id,
            ]);
        }
        return $this->sendResponse([]);
    }

    /**show method */
    public function show(Project $project){
        $project->load('images');
        return $this->sendResponse(new ProjectResource($project));
    }

    /**update method */
    public function update(ProjectRequestValidation $request, Project $project)
    {
        $data = $request->validated();
        $projectImages = $data['images'] ?? [];
        unset($data['images']);
        $project->update($data);
        foreach ($projectImages as $image){
            $imageName = FileHelper::upload_file('uploads', $image);
            ProjectImage::create([
                'image' => $imageName,
                'project_id' => $project->id,
            ]);
        }
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Project $project){
        /**destroy image */

        $project = $project->load('images');

        foreach($project->images as $imageObject){
            FileHelper::delete_file($imageObject->image);
        }

        /**destroy service */
        $project->delete();
        return $this->sendResponse([]);
    }
   
}
