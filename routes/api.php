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

Route::group(['namespace' => 'Api'], function () {
    Route::any('', 'HomeController@index');
    Route::get('user', 'UserController@index');
    Route::get('token/regenerate', 'UserController@token');
    Route::get('user/orgs', 'UserController@orgs');
    Route::get('org', 'HomeController@org');
    Route::get('org/{org?}', 'OrgController@index');
    Route::post('org/{org?}', 'OrgController@password');
    Route::put('org/{org?}', 'OrgController@update');
    Route::delete('org/{org?}', 'OrgController@delete');
    Route::post('join/{org?}', 'OrgController@join');
    Route::get('stats', 'HomeController@stats');
});
