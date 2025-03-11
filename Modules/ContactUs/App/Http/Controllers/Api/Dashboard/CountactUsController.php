<?php

namespace Modules\ContactUs\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Modules\ContactUs\App\Emails\ContactUsEmail;
use Modules\ContactUs\App\Http\Requests\Api\FrontEnd\SendEmailRequest;
use Modules\StaticPages\App\resources\Api\Dashboard\StaticPagesResource;

class CountactUsController extends Controller
{
    use ApiResponseTrait;


    public function contactUs(SendEmailRequest $request)
    {
        $data = [
            'message' => 'Email sent successfully!'
        ];
        try {
            Mail::to(config('constant.contactEmail'))
                ->send(new ContactUsEmail($request->validated()));
            return $this->sendResponse([$data]);
        } catch (\Exception $e) {

            $data = [
                'message' => 'Error in sending email!'
            ];
            return $this->sendResponse($data,'Error',$e->getMessage(),400);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contactus::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactus::create');
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
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('contactus::edit');
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
