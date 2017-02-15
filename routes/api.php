<?php


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

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::any('', 'HomeController@index');
    Route::get('user', 'UserController@index');
    Route::get('user/orgs', 'UserController@orgs');
    Route::get('org', 'HomeController@org');
    Route::get('org/{id?}', 'OrgController@index');
    Route::post('org/{id?}', 'OrgController@password');
    Route::put('org/{id?}', 'OrgController@update');
});
