<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\Api\V1\AuthUserResource;
use App\Http\Resources\Api\V1\TokenResource;
use App\Services\AuthService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public $user_relationships;
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->user_relationships = ['roles'];
    }

    //login with password grant, return short live token and refresh token

    public function passwordGrantLogin(Request $request)
    {
        $result = $this->authService->attemptLogin($request->email, $request->password);

        if (!$result) {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials!'], 401);
        }

        $user = User::whereEmail($request->email)->first();

        $logged_in_time = Carbon::now();

        $additional_info = $result + ['logged_in_time' => $logged_in_time];

        return (new AuthUserResource($user->load('roles')))->additional($additional_info);
    }

    //login with personal access client, return long live token, no refresh token

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

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        $user = $this->guard()->user();
        return new AuthUserResource($user->load($this->user_relationships));
    }

    //refresh access token

    public function refresh(Request $request)
    {
        $this->validate($request, ['refresh_token' => 'required']);

        $result = $this->authService->attemptRefresh($request->refresh_token);

        if (!$result) {
            return response()->json(['status' => 'error', 'message' => 'Invalid token!'], 401);
        }

        return $result;
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