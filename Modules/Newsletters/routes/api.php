<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Newsletters\App\Http\Controllers\Api\Frontend\NewslettersController;

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

Route::group(['prefix' => 'frontend/newsletter'], function () {
    Route::post('subscrip', [NewslettersController::class, 'store']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('newsletters', fn (Request $request) => $request->user())->name('newsletters');
});
