<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\Api\V1\AuthUserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function __construct()
    {

    }

    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);

        $credentials = $request->only('email', 'password');

        if(!$this->guard()->attempt($credentials))
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials!'], 401);
        }

        $user = $this->guard()->user();

        $token = $user->createToken('app')->accessToken;

        $logged_in_time = Carbon::now();

        return (new AuthUserResource($user->load('roles')))->additional(['token' => $token, 'logged_in_time' => $logged_in_time]);
    }

    public function logout()
    {

    }

    public function me()
    {

    }

    public function refresh()
    {

    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}