<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
    Route::get('projectmanagement', fn (Request $request) => $request->user())->name('projectmanagement');
});

Route::group(['prefix' => 'frontend'],function(){
    Route::get('projects', [ProjectsController::class, 'list']);
    Route::get('projects/{project}', [ProjectsController::class, 'show']);
});
