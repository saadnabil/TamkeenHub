<?php

namespace Modules\StaticPages\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\StaticPages\App\Http\Requests\Api\Dashboard\updateStaticPagesRequest;
use Modules\StaticPages\App\Models\StaticPages;
use Modules\StaticPages\App\resources\Api\Dashboard\StaticPagesResource;

class StaticPagesController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        $pages = StaticPages::get();
        return $this->sendResponse(StaticPagesResource::collection($pages));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staticpages::create');
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
    public function show($name)
    {
        $page = StaticPages::where('name',$name)->first();
        return $this->sendResponse(StaticPagesResource::collection([$page]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('staticpages::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateStaticPagesRequest $request)
    {
        $data = $request->validated();
        $page = StaticPages::where('name',$request->name)->first();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('uploads/staticPages',$data['image'], $page->image);
        };
        $page->update($data);
        return $this->sendResponse(StaticPagesResource::collection([$page]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
