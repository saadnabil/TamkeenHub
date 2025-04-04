<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\StaticPages\App\Http\Controllers\Api\Dashboard\StaticPagesController;


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

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function () {
    Route::get('staticPages', [StaticPagesController::class, 'index']);
    Route::get('staticPages/{name}', [StaticPagesController::class, 'show']);
    Route::post('update/staticPages', [StaticPagesController::class, 'update']);
});


Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('staticpages', fn(Request $request) => $request->user())->name('staticpages');
});
