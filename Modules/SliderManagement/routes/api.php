<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SliderManagement\App\Http\Controllers\Api\Frontend\SlidersController;

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
    Route::get('sliders', [SlidersController::class, 'index']);
    Route::get('sliders/{id}', [SlidersController::class, 'show']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('slidermanagement', fn (Request $request) => $request->user())->name('slidermanagement');
});
