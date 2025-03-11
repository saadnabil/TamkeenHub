<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
Route::group(['prefix' => 'contactUs'], function () {
    Route::post('/sendMail', [Modules\ContactUs\App\Http\Controllers\Api\Dashboard\CountactUsController::class, 'contactUs']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('contactus', fn (Request $request) => $request->user())->name('contactus');
});
