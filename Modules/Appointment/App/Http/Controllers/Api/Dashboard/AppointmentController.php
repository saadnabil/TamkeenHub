<?php

namespace Modules\Appointment\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Modules\Appointment\App\Emails\TakeAppointmentEmail;
use Modules\Appointment\App\Http\Requests\Api\Dashboard\TakeAppointmentRequest;

class AppointmentController extends Controller
{
    use ApiResponseTrait;

    public function takeAppointment(TakeAppointmentRequest $request)
    {
        $data = [
            'message' => 'Email sent successfully!'
        ];
        try {
            Mail::to(config('constant.contactEmail'))
                ->send(new TakeAppointmentEmail($request->validated()));
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
        return view('appointment::create');
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
        return view('appointment::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('appointment::edit');
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
