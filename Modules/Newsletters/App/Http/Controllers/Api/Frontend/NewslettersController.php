<?php

namespace Modules\Newsletters\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Newsletters\App\Http\Requests\Api\Frontend\StoreNewsletterRequest;
use Modules\Newsletters\App\Models\Newsletters;

class NewslettersController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('newsletters::index');
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
    public function store(StoreNewsletterRequest $request)
    {
        $data = [
            'message' => 'You have successfully subscribed'
        ];
        try {

            Newsletters::create([
                'email' => $request->email,
                'status' => false
            ]);
            return $this->sendResponse([$data]);
        } catch (\Exception $e) {
            $data = [
                'message' => $e->getMessage()
            ];
            return $this->sendResponse([$data],'Error',$e->getMessage(),400);
        }
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
