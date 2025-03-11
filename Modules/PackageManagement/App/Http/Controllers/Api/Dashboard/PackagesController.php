<?php

namespace Modules\PackageManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\PackageManagement\App\Http\Requests\Api\Dashboard\PackageRequestValidation;
use Modules\PackageManagement\App\Models\Package;
use Modules\PackageManagement\App\Models\PackageFeature;
use Modules\PackageManagement\App\resources\Api\Dashboard\PackageResource;

class PackagesController extends Controller
{

    use ApiResponseTrait;
    public function index()
    {
        $rows = Package::with('features')->get();
        return $this->sendResponse(PackageResource::collection($rows));
    }

    public function show($id)
    {
        $row = Package::with('features')->findOrFail($id);
        return $this->sendResponse(new PackageResource($row));
    }

    /**store method */
    public function store(PackageRequestValidation $request)
    {
        $data = $request->validated();
        $features = $data['features'];
        unset($data['features']);
        try{
            // Start the transaction
            DB::beginTransaction();

            $package = Package::create($data);
            foreach($features as $feature){
                $feature['checked_status'] =  $feature['checked_status']  ?? 1;
                $feature['package_id'] =  $package->id;
                PackageFeature::create($feature);
            }

            // Commit the transaction
            DB::commit();
            return $this->sendResponse([]);
        }catch(Exception $x){
            // Rollback the transaction if an exception occurs
            DB::rollBack();

            return $this->sendResponse([],'fail','An Error Occured', 400);
        }

    }

    /**update method */
    public function update(PackageRequestValidation $request, Package $package)
    {
        $data = $request->validated();
        $features = $data['features'];
        unset($data['features']);
        try{

            //Start the transaction
            DB::beginTransaction();

            $package->update($data);

            /**reset features */
            $package->features()->delete();

            foreach($features as $feature){
                $feature['checked_status'] =  $feature['checked_status']  ?? 1;
                $feature['package_id'] =  $package->id;
                PackageFeature::create($feature);
            }

            //Commit the transaction
            DB::commit();
            return $this->sendResponse([]);
        }catch(Exception $x){
            // Rollback the transaction if an exception occurs
            DB::rollBack();
            return $this->sendResponse([],'fail','An Error Occured', 400);
        }

    }

    /**destroy method */
    public function destroy(Package $package){
        /**destroy package*/
        $package->delete();
        return $this->sendResponse([]);
    }

}
