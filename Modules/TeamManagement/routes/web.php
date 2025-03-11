<?php

use Illuminate\Support\Facades\Route;
use Modules\TeamManagement\App\Http\Controllers\TeamManagementController;

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
    Route::resource('teammanagement', TeamManagementController::class)->names('teammanagement');
});
