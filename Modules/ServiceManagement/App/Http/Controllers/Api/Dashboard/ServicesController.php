<?php

namespace Modules\ServiceManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\ServiceManagement\App\Http\Requests\Api\Dashboard\ServiceRequestValidation;
use Modules\ServiceManagement\App\Models\Service;
use Modules\ServiceManagement\App\resources\Api\Dashboard\ServiceResource;

class ServicesController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $services = Service::get();
        return $this->sendResponse(ServiceResource::collection($services));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return $this->sendResponse(new ServiceResource($service));
    }

    /**store method */
    public function store(ServiceRequestValidation $request)
    {
        $data = $request->validated();
        $data['icon'] = FileHelper::upload_file('uploads',  $data['icon']);
        Service::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(ServiceRequestValidation $request, Service $service)
    {
        $data = $request->validated();
        if (isset($data['icon'])) {
            $data['icon'] = FileHelper::update_file('uploads', $data['icon'], $service->icon);
        };
        $service->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Service $service)
    {
        if (!$service == null) {
            return $this->sendResponse([], 'fail', 'Service not found', 404);
        }
        /**destroy icon */
        FileHelper::delete_file($service->icon);

        /**destroy service */
        $service->delete();
        return $this->sendResponse([]);
    }

}
