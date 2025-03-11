<?php

use Illuminate\Support\Facades\Route;
use Modules\ServiceManagement\App\Http\Controllers\ServiceManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('servicemanagement', ServiceManagementController::class)->names('servicemanagement');
});
