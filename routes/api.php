<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Dingo Api routing

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace'=>'App\Http\Controllers\Api\V1', 'prefix' => 'v1' ], function ($api) {

        //your API routes inside here

        $api->get('test', 'SampleApiController@index');

        //auth routes

        $api->post('login', 'AuthController@login');

        $api->group(['middleware' => 'auth:api'], function($api) {

            //log out
            $api->post('logout', 'AuthController@logout');

            //get current logged in user info by token
            $api->get('me', 'AuthController@me');
        });

        //users routes

        $api->get('users', 'UserController@index');
        $api->post('users', 'UserController@store');
        $api->get('users/{user_id}', 'UserController@show');
        $api->put('users/{user_id}', 'UserController@update');
        $api->delete('users/{user_id}', 'UserController@destroy');

        //roles routes

        $api->get('roles', 'RoleController@index');
        $api->post('roles', 'RoleController@store');
        $api->get('roles/{role_id}', 'RoleController@show');
        $api->put('roles/{role_id}', 'RoleController@update');
        $api->delete('roles/{role_id}', 'RoleController@destroy');

        //permissions routes

        $api->get('permissions', 'PermissionController@index');
        $api->post('permissions', 'PermissionController@store');
        $api->get('permissions/{permission_id}', 'PermissionController@show');
        $api->put('permissions/{permission_id}', 'PermissionController@update');
        $api->delete('permissions/{permission_id}', 'PermissionController@destroy');

    });
});
