<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;

use App\ApiPermission;
use App\Http\Requests\Api\V1\StorePermissionRequest;
use App\Http\Requests\Api\V1\UpdatePermissionRequest;
use App\Http\Resources\Api\V1\PermissionResource;
use App\Filters\Api\V1\PermissionFilter;

class PermissionController extends ApiController
{
    protected $permission;

    /**
     * Create a new controller instance.
     *
     * @param ApiPermission $permission
     */
    public function __construct(ApiPermission $permission)
    {
        $this->permission = $permission;

        //check access permission
//        $this->middleware('permission_guard');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param PermissionFilter $filters
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, PermissionFilter $filters)
    {
        $permissions = $this->permission->filter($filters)->result();

        return PermissionResource::collection($permissions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\StorePermissionRequest $request
     * @return PermissionResource
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = $this->permission->create($request->all());

        return new PermissionResource($permission);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $permission_id
     * @return PermissionResource
     */
    public function show($permission_id)
    {
        $permission = $this->permission->findOrFail($permission_id);

        return new PermissionResource($permission);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\UpdatePermissionRequest $request
     * @param  int $permission_id
     * @return PermissionResource
     */
    public function update(UpdatePermissionRequest $request, $permission_id)
    {
        $permission = $this->permission->findOrFail($permission_id);

        $permission->fill($request->all());

        $permission->save();

        return new PermissionResource($permission);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $permission_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission_id)
    {
        $permission = $this->permission->findOrFail($permission_id);
        $permission->delete();

        return $this->response->noContent();
    }
}
