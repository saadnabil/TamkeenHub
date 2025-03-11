<?php

namespace Modules\ServiceManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ServiceManagement\App\Models\Service;
use Modules\ServiceManagement\App\resources\Api\ServiceResource;

class ServicesController extends Controller
{
    use ApiResponseTrait;

    public function indexForFrontend()
    {
        $services = Service::get();
        return $this->sendResponse(ServiceResource::collection($services));
    }

    public function showForFrontend($id)
    {
        $service = Service::findOrFail($id);
        return $this->sendResponse(new ServiceResource($service));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('servicemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('servicemanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
