<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\SettingManagement\App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (\Schema::hasTable('settings')) {
            // تحميل القيمة من قاعدة البيانات إذا كان الجدول موجودًا
            $contactEmail = Setting::first()->email ?? 'info@example.com';
            config(['constant.contactEmail' => $contactEmail]);
        }
    }
}
