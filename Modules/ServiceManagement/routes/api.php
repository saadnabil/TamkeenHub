<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\ServiceManagement\App\Http\Controllers\Api\Frontend\ServicesController;

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
Route::group(['prefix' => 'frontend'], function () {
    Route::get('services', [ServicesController::class, 'indexForFrontend']);
    Route::get('services/{id}', [ServicesController::class, 'showForFrontend']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('servicemanagement', fn (Request $request) => $request->user())->name('servicemanagement');
});
