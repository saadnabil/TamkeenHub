<?php

use Illuminate\Support\Facades\Route;
use Modules\ServiceManagement\App\Http\Controllers\Dashboard\ServicesController;
use Modules\SliderManagement\App\Http\Controllers\Api\Dashboard\SlidersController;
use Modules\TeamManagement\App\Http\Controllers\Api\Dashboard\TeamsController;

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('teams', TeamsController::class);
});
