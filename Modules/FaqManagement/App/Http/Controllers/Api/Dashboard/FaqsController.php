<?php

namespace Modules\FaqManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\FaqManagement\App\Http\Requests\Api\Dashboard\FaqRequestValidation;
use Modules\FaqManagement\App\Models\Faq;
use Modules\FaqManagement\App\resources\Api\Dashboard\FaqResource;

class FaqsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $rows = Faq::get();
        return $this->sendResponse(FaqResource::collection($rows));
    }

    /**store method */
    public function store(FaqRequestValidation $request)
    {
        $data = $request->validated();
        Faq::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(FaqRequestValidation $request, Faq $faq)
    {
        $data = $request->validated();
        $faq->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Faq $service)
    {
        /**destroy faq */
        $service->delete();
        return $this->sendResponse([]);
    }
}
