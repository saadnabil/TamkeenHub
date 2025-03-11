<?php

namespace Modules\JoinUs\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Modules\JoinUs\App\Emails\JoinUsEmail;
use Modules\JoinUs\App\Http\Requests\Api\Dashboard\JoinUsRequest;


class JoinUsController extends Controller
{
    use ApiResponseTrait;


    public function contactUs(JoinUsRequest $request)
    {
        $data = [
            'message' => 'Email sent successfully!'
        ];
        try {
            Mail::to(config('constant.contactEmail'))
                ->send(new JoinUsEmail($request->validated()));
            return $this->sendResponse([$data]);
        } catch (\Exception $e) {

            $data = [
                'message' => 'Error in sending email!'
            ];
            return $this->sendResponse($data,'Error',$e->getMessage(),400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('joinus::create');
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
        return view('joinus::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('joinus::edit');
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
