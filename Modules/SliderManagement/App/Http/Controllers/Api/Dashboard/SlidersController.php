<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ServiceManagement\App\resources\Dashboard\ServiceResource;
use Modules\SliderManagement\App\Http\Requests\Api\Dashboard\SliderRequestValidation;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\resources\Api\Dashboard\SliderResource;

class SlidersController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $services = Slider::get();
        return $this->sendResponse(SliderResource::collection($services));
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return $this->sendResponse(new SliderResource($slider));
    }

    /**store method */
    public function store(SliderRequestValidation $request)
    {
        $data = $request->validated();
        $data['background'] = FileHelper::upload_file('uploads',  $data['background']);
        Slider::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(SliderRequestValidation $request, Slider $slider)
    {
        $data = $request->validated();
        if(isset($data['background'])){
            $data['background'] = FileHelper::update_file('uploads',$data['background'], $slider->background);
        };
       $slider->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Slider $slider){
        /**destroy icon */
        FileHelper::delete_file($slider->background);

        /**destroy service */
        $slider->delete();
        return $this->sendResponse([]);
    }
}
