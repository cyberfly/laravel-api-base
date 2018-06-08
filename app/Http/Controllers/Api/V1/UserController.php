<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Filters\Api\V1\UserFilter;

class UserController extends ApiController
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        //check access permission
//        $this->middleware('user_guard');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param UserFilter $filters
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, UserFilter $filters)
    {
        $users = $this->user->filter($filters)->result();

        return UserResource::collection($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->user->create($request->all());

        return new UserResource($user);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $user_id
     * @return UserResource
     */
    public function show($user_id)
    {
        $user = $this->user->findOrFail($user_id);

        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\UpdateUserRequest $request
     * @param  int $user_id
     * @return UserResource
     */
    public function update(UpdateUserRequest $request, $user_id)
    {
        $user = $this->user->findOrFail($user_id);

        $user->fill($request->except('email'));

        $user->save();

        return new UserResource($user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = $this->user->findOrFail($user_id);
        $user->delete();

        return $this->response->noContent();
    }
}
