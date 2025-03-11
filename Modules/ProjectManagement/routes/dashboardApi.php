<?php

use Illuminate\Support\Facades\Route;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectImagesController;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectsController;


Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('projects', ProjectsController::class);
    Route::resource('projectImages', ProjectImagesController::class)->only('destroy');
});
