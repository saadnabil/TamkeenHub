<?php

use Illuminate\Support\Facades\Route;
use Modules\ServiceManagement\App\Http\Controllers\Api\Dashboard\ServicesController;

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('services', ServicesController::class);
});
