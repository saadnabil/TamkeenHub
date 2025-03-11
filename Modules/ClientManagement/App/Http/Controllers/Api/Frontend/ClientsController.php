<?php

namespace Modules\ClientManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ClientManagement\App\Models\Client;
use Modules\ClientManagement\App\resources\Api\Dashboard\ClientResource;

class ClientsController extends Controller
{
   use ApiResponseTrait;
   public function list(){
        $rows = Client::get();
        return $this->sendResponse(ClientResource::collection($rows));
   }
}
