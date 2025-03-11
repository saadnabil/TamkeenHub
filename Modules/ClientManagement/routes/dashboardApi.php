<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientManagement\App\Http\Controllers\Api\Dashboard\ClientsController;

Route::group(['prefix' => 'dashboard'],function(){
    Route::resource('clients', ClientsController::class);
});