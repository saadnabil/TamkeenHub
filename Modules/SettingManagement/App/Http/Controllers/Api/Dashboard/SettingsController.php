<?php

namespace Modules\SettingManagement\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Modules\SettingManagement\App\Http\Requests\Api\Dashboard\SettingRequestValidation;
use Modules\SettingManagement\App\Models\Setting;

class SettingsController extends Controller
{
    use ApiResponseTrait;
    public function list(){
        $row = Setting::first();
        return $this->sendResponse($row);
    }
    public function update(SettingRequestValidation $request){

        $data = $request->validated();
        Setting::updateOrCreate(['id' => 1],$data);
        Artisan::call('config:cache');
        return $this->sendResponse([]);
    }

}
