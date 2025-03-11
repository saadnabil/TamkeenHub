<?php

use Illuminate\Support\Facades\Route;
use Modules\ReviewManagement\App\Http\Controllers\Api\Dashboard\ReviewsController;

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('reviews', ReviewsController::class);
});