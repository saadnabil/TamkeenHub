<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\FaqManagement\App\Http\Controllers\Api\Frontend\FaqsController;

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
    Route::get('faqmanagement', fn (Request $request) => $request->user())->name('faqmanagement');
});

Route::group(['prefix' => 'frontend'],function(){
    Route::get('faqs', [FaqsController::class, 'list']);
    Route::get('faqs/{faq}', [FaqsController::class, 'show']);
});

