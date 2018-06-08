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

        //users routes

        $api->get('users', 'UserController@index');
        $api->post('users', 'UserController@store');
        $api->get('users/{user_id}', 'UserController@show');
        $api->put('users/{user_id}', 'UserController@update');
        $api->delete('users/{user_id}', 'UserController@destroy');

    });
});
