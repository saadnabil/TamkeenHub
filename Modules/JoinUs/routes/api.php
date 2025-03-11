<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\JoinUs\App\Http\Controllers\Api\Dashboard\JoinUsController;

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

Route::group(['prefix' => 'joinUs'], function () {
    Route::post('sendMail', [JoinUsController::class, 'contactUs']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('joinus', fn (Request $request) => $request->user())->name('joinus');
});
