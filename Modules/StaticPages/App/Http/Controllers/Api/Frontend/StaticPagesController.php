<?php

namespace Modules\StaticPages\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\StaticPages\App\Models\StaticPages;
use Modules\StaticPages\App\resources;
use Modules\StaticPages\App\resources\Api\StaticPagesResource;

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
