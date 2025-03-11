<?php

namespace Modules\Newsletters\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Newsletters\App\Models\Newsletters;

class NewslettersController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Newsletters::all(['email','status']);
            return $this->sendResponse([$data]);
        } catch (\Exception $e) {
            $data = [
                'message' => $e->getMessage()
            ];
            return $this->sendResponse([$data],'Error',$e->getMessage(),400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsletters::create');
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
        return view('newsletters::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('newsletters::edit');
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
