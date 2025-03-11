<?php

use Illuminate\Support\Facades\Route;
use Modules\FaqManagement\App\Http\Controllers\Api\Dashboard\FaqsController;

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'],function(){
    Route::resource('faqs', FaqsController::class);
});