<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\ApiRole;
use App\Http\Requests\Api\V1\StoreRoleRequest;
use App\Http\Requests\Api\V1\UpdateRoleRequest;
use App\Http\Resources\Api\V1\RoleResource;
use App\Filters\Api\V1\RoleFilter;

class RoleController extends ApiController
{
    protected $role;

    /**
     * Create a new controller instance.
     *
     * @param ApiRole $role
     */
    public function __construct(ApiRole $role)
    {
        $this->role = $role;

        //check access permission
//        $this->middleware('role_guard');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param RoleFilter $filters
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, RoleFilter $filters)
    {
        $roles = $this->role->filter($filters)->result();

        return RoleResource::collection($roles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\StoreRoleRequest $request
     * @return RoleResource
     */
    public function store(StoreRoleRequest $request)
    {
        $role = $this->role->create($request->all());

        return new RoleResource($role);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $role_id
     * @return RoleResource
     */
    public function show($role_id)
    {
        $role = $this->role->findOrFail($role_id);

        return new RoleResource($role);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\UpdateRoleRequest $request
     * @param  int $role_id
     * @return RoleResource
     */
    public function update(UpdateRoleRequest $request, $role_id)
    {
        $role = $this->role->findOrFail($role_id);

        $role->fill($request->except('email'));

        $role->save();

        return new RoleResource($role);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $role_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role_id)
    {
        $role = $this->role->findOrFail($role_id);
        $role->delete();

        return $this->response->noContent();
    }
}
