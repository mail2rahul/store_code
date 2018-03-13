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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('recover', 'UserController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'UserController@logout');
    Route::get('show', 'UserController@show');
});*/
Route::group(['middleware' => ['api','cors']], function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('show', 'UserController@show');
        Route::get('logout', 'UserController@logout');

    });

});
