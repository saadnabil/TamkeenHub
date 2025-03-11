<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PackageManagement\App\Http\Controllers\Api\Frontend\PackagesController;
use Modules\ProjectManagement\App\Http\Controllers\Api\Frontend\ProjectsController;

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

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('packagemanagement', fn (Request $request) => $request->user())->name('packagemanagement');
});

Route::group(['prefix' => 'frontend'],function(){
    Route::get('packages', [PackagesController::class, 'list']);
    Route::get('packages/{package}', [PackagesController::class, 'show']);
});


