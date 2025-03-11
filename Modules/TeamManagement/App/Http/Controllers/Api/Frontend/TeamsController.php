<?php

namespace Modules\TeamManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TeamManagement\App\Models\Team;
use Modules\TeamManagement\App\resources\Api\TeamResource;

class TeamsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $services = Team::get();
        return $this->sendResponse(TeamResource::collection($services));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teammanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $team = Team::FindOrFail($id);
        return $this->sendResponse(TeamResource::collection([$team]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('teammanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
