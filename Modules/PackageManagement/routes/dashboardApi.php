<?php

use Illuminate\Support\Facades\Route;
use Modules\PackageManagement\App\Http\Controllers\Api\Dashboard\PackagesController;

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function() {
    Route::resource('packages', PackagesController::class);
});

