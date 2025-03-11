<?php

namespace Modules\ClientManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ClientManagement\App\Http\Requests\Api\Dashboard\ClientRequestValidation;
use Modules\ClientManagement\App\Models\Client;
use Modules\ClientManagement\App\resources\Api\Dashboard\ClientResource;

class ClientsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $clients = Client::get();
        return $this->sendResponse(ClientResource::collection($clients));
    }

    public function show($id)
    {
         $client = Client::findOrFail($id);
        return $this->sendResponse(new ClientResource($client));
    }

    /**store method */
    public function store(ClientRequestValidation $request)
    {
        $data = $request->validated();
        $data['logo'] = FileHelper::upload_file('uploads',  $data['logo']);
        Client::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(ClientRequestValidation $request, Client $client)
    {
        $data = $request->validated();
        if (isset($data['logo'])) {
            $data['logo'] = FileHelper::update_file('uploads', $data['logo'], $client->logo);
        };
        $client->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Client $client)
    {
        /**destroy logo */
        FileHelper::delete_file($client->logo);

        /**destroy client */
        $client->delete();
        return $this->sendResponse([]);
    }
}
