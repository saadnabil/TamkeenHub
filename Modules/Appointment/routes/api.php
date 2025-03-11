<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Appointment\App\Http\Controllers\Api\Dashboard\AppointmentController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::group(['prefix' => 'appointment'], function () {
    Route::post('/takeAppointment', [AppointmentController::class, 'takeAppointment']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('appointment', fn (Request $request) => $request->user())->name('appointment');
});
